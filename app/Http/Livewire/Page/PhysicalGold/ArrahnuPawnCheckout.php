<?php

namespace App\Http\Livewire\Page\PhysicalGold;

use App\Models\ArrahnuDailyPrice;
use App\Models\ArrahnuGoldBox;
use App\Models\ArrahnuPawnDetails;
use App\Models\ArrahnuPawnMaster;
use App\Models\ArrahnuStaffCash;
use App\Models\Banks;
use Livewire\Component;
use App\Models\GoldbarOwnership;
use App\Models\GoldMinting;
use App\Models\GoldMintingRecords;
use App\Models\InvCart;
use App\Models\MarketPrice;
use App\Models\MintingGoldPrice;
use App\Models\outrightSG;
use App\Models\outrightSGRecords;
use App\Models\Profile_bank_info;
use Illuminate\Support\Str;
use App\Models\States;
use App\Models\ToyyibBills;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class ArrahnuPawnCheckout extends Component
{


    public $bankId, $swiftCode, $accNo, $accHolderName, $bankAccId, $membership_id;

    public $states, $banks;
    public $GoldMint, $GoldMintGram, $MintingCost, $total, $spotPrice, $data, $tot_data, $goldprice;
    public $total_weight, $total_pawn, $financeAmt, $maximum_financing, $pay_type;

    public function mount()
    {
        $this->data = request()->session()->get('products');
        $this->total_weight = request()->session()->get('totalWeight');
        $this->total_pawn = request()->session()->get('total');
        $this->tot_data = count($this->data);
        $this->maximum_financing = MoneyToFloat(MoneyRound($this->total_pawn * 0.8));
        $this->financeAmt = $this->maximum_financing;


        $goldprice = ArrahnuDailyPrice::fetchTodayGoldPriceDetails();
        $this->goldprice = $goldprice['17   '];
        $bankInfo = Profile_bank_info::where('user_id', auth()->user()->id)->first();

        $this->states = States::all();
        $this->banks = Banks::all();
        $this->spotPrice = MarketPrice::where('item_id', 12)->first();


        $this->membership_id = auth()->user()->profile->membership_id ?? "";

        $this->bankId = $bankInfo->bank_id ?? "";
        $this->swiftCode = $bankInfo->swift_code ?? "";
        $this->accNo = $bankInfo->acc_no ?? "";
        $this->accHolderName = $bankInfo->acc_holder_name ?? "";
        $this->bankAccId = $bankInfo->acc_id ?? "";



        $this->GoldMint = InvCart::where('user_id', auth()->user()->id)->where('exit_type', 4)->first();
        $this->total = $this->GoldMint->prod_gram * $this->spotPrice->price;

        if (!$this->GoldMint) {
            redirect('home');
        } else {
            $this->GoldMintGram = $this->GoldMint->prod_gram;
        }
    }

    function pawnSiriNoGenerator($type = 'AKP')
    {
        $types = [
            'AKP' => 'AKP'
        ];

        $branch_id = str_pad('W1', 2, '0', STR_PAD_LEFT);
        $date = now()->format('dmy');

        $running_no = ArrahnuPawnMaster::where('BRANCH_CODE', 'W1')->whereRaw('CAST(PAWN_DATE AS DATE) = ?', [date('Y-m-d')])->where('PROD_CODE', '6')->count() + 1;

        $running_no = str_pad($running_no, 4, '0', STR_PAD_LEFT);
        $header = $types[$type] ?? $type[1];

        return $header . $branch_id . "-" . $date . "-" . $running_no;
    }

    public function getKotak()
    {
        ArrahnuGoldBox::where('TOT_IN_USE', null)->update([
            'TOT_IN_USE' => 0
        ]);

        ArrahnuGoldBox::where('CURRENT_COLLECTION', null)->update([
            'CURRENT_COLLECTION' => 0
        ]);

        return ArrahnuGoldBox::where('BRANCH_CODE', 'W1')
            ->where('BOX_TYPE', 'BSKE')
            ->where('RECORD_STATUS', 'AKTIF')
            ->where('ACTIVE_DAY', 'YA')
            ->whereRaw('TOT_CAPACITY - TOT_IN_USE - CURRENT_COLLECTION > 0')
            ->orderBy('BOX_NO')->first();
    }

    public function getMaturityDate($date)
    {
        $day_count = 30 * 18;
        return date('Y-m-d', strtotime('+' . $day_count . ' days', strtotime($date)));
    }

    public function submit()
    {
        $customer_financing = $this->maximum_financing;
        $profit_percentage = MoneyToFloat(0.096);
        $product_duration = MoneyToFloat(18 / 12);
        $profit = MoneyRound($customer_financing * $profit_percentage * $product_duration);
        $mat_date = $this->getMaturityDate(now());
        $siri_no = $this->pawnSiriNoGenerator('AKP');
        $p_date = date('Y-m-d H:i:s', strtotime(now()));

        $kotak = $this->getKotak();
        $kotak->CURRENT_COLLECTION += $this->tot_data;
        $kotak->save();

        $gold_ownId = array();


        // // Add financing to teller collection
        $staff_cash = ArrahnuStaffCash::where('BIZ_DATE', date('Y-m-d'))->where('STAFF_ID', 45990)->first();
        $staff_cash->TRX_COLLECTION = $staff_cash->TRX_COLLECTION + MoneyToFloat($this->financeAmt);
        $staff_cash->save();

        // Save pawn master
        ArrahnuPawnMaster::create([
            'CIF_NO' => 12244,
            'SIRI_NO' => $siri_no,
            'PROD_CODE' => 6,
            'PAWN_DATE' => $p_date,
            'MAT_DATE' => $mat_date,
            'TOT_WEIGHT' => MoneyToFloat($this->total_weight),
            'TOT_VALUE_MARHUN' => MoneyToFloat($this->total_pawn),
            'TOT_PROFIT' => MoneyToFloat($profit),
            'BAL_TOT_PROFIT' => MoneyToFloat($profit),
            'MAX_AMT_FIN' => MoneyToFloat($this->maximum_financing),
            'TOT_AMT_FIN' => MoneyToFloat($this->financeAmt),
            'BAL_OUTSTANDING' => MoneyToFloat($this->financeAmt),
            'PAY_TYPE' => $this->pay_type,
            'STATUS' => 'APPLY',
            'BOX_NO' => $kotak->BOX_NO,
            'STAFF_ID' => 45990,
            'BRANCH_CODE' => 'W1',
        ]);

        // Save pawn detailed
        foreach ($this->data as $row) {

            ArrahnuPawnDetails::create([
                'SIRI_NO' => $siri_no,
                'QTY' => 1,
                'MARHUN_CODE' => 10,
                'WEIGHT' => $row['grammage'],
                'KARAT' => MoneyToFloat(24.0),
                'PRICE' => MoneyToFloat($row['tot_price']),
                'REMARKS' => 'GADAIAN KAP',
                'CERT_NO' => 1,
            ]);

            // Update available gold



            if ($row['spot_gold'] == 1) {
                $golds = GoldbarOwnership::where('user_id', auth()->user()->id)
                    ->where('active_ownership', 1)
                    ->where('spot_gold', 1)
                    ->where('available_weight', '!=', 0)
                    ->orderByDesc('weight')
                    ->get();
            } else if ($row['spot_gold'] == 0) {
                $golds = GoldbarOwnership::where('user_id', auth()->user()->id)
                    ->where('active_ownership', 1)
                    ->where('spot_gold', 0)
                    ->where('available_weight', '!=', 0)
                    ->orderByDesc('weight')
                    ->get();
            }

            foreach ($golds as $item) {
                $buffer_grammage = $row['grammage'];

                if ($buffer_grammage != 0) {
                    if ($row['grammage'] > $item->available_weight) {
                        $row['grammage'] -= $item->available_weight;
                        $buffer_grammage = $item->available_weight;
                    } else {
                        $row['grammage'] -= $buffer_grammage;
                    }


                    $item->available_weight -= $buffer_grammage;
                    $item->save();

                    array_push($gold_ownId, $item->id);
                }
            }



            // Exec SP Pre save
            $staff = 45990;
            $branch = 'W1';
            $identity_no = $this->customer_info['identity_no'];
            $weight = $row['total_weight'];
            $time = date('Y-m-d');
            $sql = DB::update("EXEC ARRAHNU.sp_ar_bske_acct_trx_pre_aprv '$staff', '$identity_no', '$time', '$weight', '$branch', '$siri_no'");
        }

        session()->flash('message', 'Your Arrahnu Pawn request has successfully submitted');
        session()->flash('success');
        session()->flash('title', 'Success!');
        return redirect('home');
    }

    public function render()
    {
        return view('livewire.page.physical-gold.arrahnu-pawn-checkout')->extends('default.default');
    }
}
