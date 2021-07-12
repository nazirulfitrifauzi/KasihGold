<?php

namespace App\Http\Livewire\Page\PhysicalGold;

use App\Models\Banks;
use App\Models\BuyBack;
use App\Models\GoldbarOwnership;
use App\Models\OutrightSell;
use Illuminate\Support\Str;
use App\Models\Profile_bank_info;
use Livewire\Component;

class BbCheckout extends Component
{

    public $bankId, $swiftCode, $accNo, $accHolderName, $bankAccId;
    public $banks, $data, $total, $outright;

    public function mount()
    {
        $bankInfo = Profile_bank_info::where('user_id', auth()->user()->id)->first();
        $this->banks = Banks::all();
        $this->bankId = $bankInfo->bank_id ?? "";
        $this->swiftCode = $bankInfo->swift_code ?? "";
        $this->accNo = $bankInfo->acc_no ?? "";
        $this->accHolderName = $bankInfo->acc_holder_name ?? "";
        $this->bankAccId = $bankInfo->acc_id ?? "";
        $this->data = request()->session()->get('products');
        $this->total = request()->session()->get('total');
        $this->outright = request()->session()->get('outright');
    }


    public function submit()
    {


        if ($this->outright == 1) {
            $outright = OutrightSell::create([
                'user_id'                   => auth()->user()->id,
                'status'                    => 0,
                'ouid'                      => (string) Str::uuid(),
                'centigram'                 => $this->data[3]['qty'],
                'decigram'                  => $this->data[2]['qty'],
                'quarter_gram'              => $this->data[1]['qty'],
                'one_gram'                  => $this->data[0]['qty'],
                'surrendered_amount'        => $this->total,
                'updated_by'                => auth()->user()->id,
                'created_by'                => auth()->user()->id,
                'created_at'                => now(),
                'updated_at'                => now(),
            ]);

            $outrightId = $outright->id;

            foreach ($this->data as $product) {
                if ($product['qty'] != 0) {
                    for ($i = 0; $i < $product['qty']; $i++) {
                        $gold = GoldbarOwnership::where('user_id', auth()->user()->id)
                            ->where('weight', $product['type'])
                            ->where('active_ownership', 1)
                            ->first();

                        if ($gold) {
                            $gold->active_ownership = 0;
                            $gold->ex_id = $outrightId;
                            $gold->save();
                        }
                    }
                }
            }
            session()->flash('message', 'Your Outright Sell request has successfully submitted');
        } else if ($this->outright == 0) {
            $buyback = BuyBack::create([
                'user_id'                   => auth()->user()->id,
                'status'                    => 0,
                'ouid'                      => (string) Str::uuid(),
                'centigram'                 => $this->data[3]['qty'],
                'decigram'                  => $this->data[2]['qty'],
                'quarter_gram'              => $this->data[1]['qty'],
                'one_gram'                  => $this->data[0]['qty'],
                'surrendered_amount'        => $this->total,
                'buyback_price'             => ($this->total * 1.06),
                'buyback_date'              => now()->addMonths(7),
                'updated_by'                => auth()->user()->id,
                'created_by'                => auth()->user()->id,
                'created_at'                => now(),
                'updated_at'                => now(),
            ]);

            $buybackId = $buyback->id;

            foreach ($this->data as $product) {
                if ($product['qty'] != 0) {
                    for ($i = 0; $i < $product['qty']; $i++) {
                        $gold = GoldbarOwnership::where('user_id', auth()->user()->id)
                            ->where('weight', $product['type'])
                            ->where('active_ownership', 1)
                            ->first();

                        if ($gold) {
                            $gold->active_ownership = 0;
                            $gold->ex_id = $buybackId;
                            $gold->save();
                        }
                    }
                }
            }

            session()->flash('message', 'Your Buy Back request has successfully submitted');
        }

        session()->flash('success');
        session()->flash('title', 'Success!');
        return redirect('home');
    }

    public function render()
    {
        return view('livewire.page.physical-gold.bb-checkout');
    }
}
