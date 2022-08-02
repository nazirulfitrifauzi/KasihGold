<?php

namespace App\Http\Livewire\Page\PhysicalGold;

use App\Models\Banks;
use App\Models\BuyBack;
use App\Models\GoldbarOwnership;
use App\Models\InvCart;
use App\Models\OutrightSell;
use Illuminate\Support\Str;
use App\Models\Profile_bank_info;
use Livewire\Component;

class BbCheckout extends Component
{

    public $bankId, $swiftCode, $accNo, $accHolderName, $bankAccId;
    public $banks, $data, $total, $outright, $cartInfo;
    public $centiG, $deciG, $quartG, $oneG, $beyond1G;

    public function mount()
    {
        $bankInfo = Profile_bank_info::where('user_id', auth()->user()->id)->first();
        $this->banks = Banks::all();
        $this->bankId = $bankInfo->bank_id ?? "";
        $this->swiftCode = $bankInfo->swift_code ?? "";
        $this->accNo = $bankInfo->acc_no ?? "";
        $this->accHolderName = $bankInfo->acc_holder_name ?? "";
        $this->bankAccId = $bankInfo->acc_id ?? "";

        $this->cartInfo = InvCart::where('user_id', auth()->user()->id)->where('exit_type', 1)->get();

        $this->total = 0;
        $this->centiG = 0;
        $this->deciG = 0;
        $this->quartG = 0;
        $this->oneG = 0;
        $this->beyond1G = 0;

        foreach ($this->cartInfo as $cart) {
            $this->total += $cart->products->prod_weight * $cart->prod_qty;
            if ($cart->products->prod_weight == 0.01)
                $this->centiG = $cart->prod_qty;
            else if ($cart->products->prod_weight == 0.10)
                $this->deciG = $cart->prod_qty;
            else if ($cart->products->prod_weight == 0.25)
                $this->quartG = $cart->prod_qty;
            else if ($cart->products->prod_weight == 1.00)
                $this->oneG = $cart->prod_qty;
            else
                $this->beyond1G = $cart->prod_qty;
        }

        $this->total = $this->total * 310;



        if (!request()->session()->get('outright')) {
            return redirect('home');
        }
        $this->outright = request()->session()->get('outright');
    }


    public function submit()
    {


        if ($this->outright == 1) {
            $outright = OutrightSell::create([
                'user_id'                   => auth()->user()->id,
                'status'                    => 0,
                'ouid'                      => (string) Str::uuid(),
                'centigram'                 => $this->centiG,
                'decigram'                  => $this->deciG,
                'quarter_gram'              => $this->quartG,
                'one_gram'                  => $this->oneG,
                'beyond1G'                  => $this->beyond1G,
                'surrendered_amount'        => $this->total,
                'updated_by'                => auth()->user()->id,
                'created_by'                => auth()->user()->id,
                'created_at'                => now(),
                'updated_at'                => now(),
            ]);

            $outrightId = $outright->id;

            foreach ($this->cartInfo as $product) {
                for ($i = 0; $i < $product->prod_qty; $i++) {
                    $gold = GoldbarOwnership::where('user_id', auth()->user()->id)
                        ->where('weight', $product->products->prod_weight)
                        ->where('active_ownership', 1)
                        ->first();

                    if ($gold) {
                        $gold->active_ownership = 0;
                        $gold->ex_flag = 0;
                        $gold->ex_id = $outrightId;
                        $gold->save();
                    }
                }
            }
            session()->flash('message', 'Your Outright Sell request has successfully submitted');
        } else if ($this->outright == 2) {
            $buyback = BuyBack::create([
                'user_id'                   => auth()->user()->id,
                'status'                    => 0,
                'ouid'                      => (string) Str::uuid(),
                'centigram'                 => $this->centiG,
                'decigram'                  => $this->deciG,
                'quarter_gram'              => $this->quartG,
                'one_gram'                  => $this->oneG,
                'beyond1G'                  => $this->beyond1G,
                'surrendered_amount'        => $this->total,
                'buyback_price'             => ($this->total * 1.06),
                'buyback_date'              => now()->addMonths(7),
                'updated_by'                => auth()->user()->id,
                'created_by'                => auth()->user()->id,
                'created_at'                => now(),
                'updated_at'                => now(),
            ]);

            $buybackId = $buyback->id;

            foreach ($this->cartInfo as $product) {
                for ($i = 0; $i < $product->prod_qty; $i++) {
                    $gold = GoldbarOwnership::where('user_id', auth()->user()->id)
                        ->where('weight', $product->products->prod_weight)
                        ->where('active_ownership', 1)
                        ->first();

                    if ($gold) {
                        $gold->active_ownership = 0;
                        $gold->ex_flag = 0;
                        $gold->ex_id = $buybackId;
                        $gold->save();
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
