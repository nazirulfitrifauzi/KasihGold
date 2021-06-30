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
        $centigram = 0;
        $decigram  = 0;
        $quarter_gram = 0;
        $one_gram = 0;

        foreach ($this->data as $product) {

            if ($product['type'] == 0.01) {
                $centigram = $product['qty'];
            } elseif ($product['type'] == 0.1) {
                $decigram  = $product['qty'];
            } elseif ($product['type'] == 0.25) {
                $quarter_gram = $product['qty'];
            } elseif ($product['type'] == 1) {
                $one_gram = $product['qty'];
            }
            if ($product['qty'] != 0) {
                for ($i = 0; $i < $product['qty']; $i++) {
                    $gold = GoldbarOwnership::where('user_id', auth()->user()->id)
                        ->where('weight', $product['type'])
                        ->where('active_ownership', 1)
                        ->first();

                    if ($gold) {
                        $gold->update(array(
                            'active_ownership' => 0,
                        ));
                    }
                }
            }
        }

        if ($this->outright == 1) {
            OutrightSell::create([
                'user_id'                   => auth()->user()->id,
                'status'                    => 0,
                'ouid'                      => (string) Str::uuid(),
                'centigram'                 => $centigram,
                'decigram'                  => $decigram,
                'quarter_gram'              => $quarter_gram,
                'one_gram'                  => $one_gram,
                'surrendered_amount'        => $this->total,
                'updated_by'                => auth()->user()->id,
                'created_by'                => auth()->user()->id,
                'created_at'                => now(),
                'updated_at'                => now(),
            ]);
            session()->flash('message', 'Your Outright Sell request has successfully submitted');
        } else if ($this->outright == 0) {
            BuyBack::create([
                'user_id'                   => auth()->user()->id,
                'status'                    => 0,
                'ouid'                      => (string) Str::uuid(),
                'centigram'                 => $centigram,
                'decigram'                  => $decigram,
                'quarter_gram'              => $quarter_gram,
                'one_gram'                  => $one_gram,
                'surrendered_amount'        => $this->total,
                'buyback_price'             => ($this->total * 1.06),
                'buyback_date'              => now()->addMonths(7),
                'updated_by'                => auth()->user()->id,
                'created_by'                => auth()->user()->id,
                'created_at'                => now(),
                'updated_at'                => now(),
            ]);
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
