<?php

namespace App\Http\Livewire\Page\PhysicalGold;

use App\Models\GoldbarOwnership;
use App\Models\InvCart;
use App\Models\InvInfo;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class OutrightCheckout extends Component
{

    public $prod_qty, $type, $total, $total_weight, $buybackStatus;
    public $goldOwnership;

    public function mount()
    {





        $this->buybackStatus = 0;
    }

    public function exitProdAdd($type)
    {
        $gold = GoldbarOwnership::where('user_id', auth()->user()->id)->where('item_id', $type)->where('active_ownership', 1)->first();
        $goldQty = GoldbarOwnership::where('user_id', auth()->user()->id)->where('item_id', $type)->groupBy('item_id')->select('item_id', DB::raw('count(*) as total'))->first();

        if ($gold->cart) {

            $outCart = $gold->cart->where('exit_type', 1)->where('item_id', $type)->first();
            if ($outCart) {

                if ($goldQty->total > $outCart->prod_qty) {
                    $outCart->prod_qty += 1;
                    $outCart->save();
                } else {
                    session()->flash('error');
                    session()->flash('title', 'Invalid Quantity!');
                    session()->flash('message', 'You cannot exceed more than what you own.');
                }
            } else {
                InvCart::create(
                    [
                        'user_id'       => auth()->user()->id,
                        'item_id'       => $type,
                        'prod_qty'      => 1,
                        'exit_type'     => 1,
                        'created_by'    => auth()->user()->id,
                        'updated_by'    => auth()->user()->id,
                        'created_at'    => now(),
                        'updated_at'    => now(),
                    ]
                );
            }
        } else {
            InvCart::create(
                [
                    'user_id'       => auth()->user()->id,
                    'item_id'       => $type,
                    'prod_qty'      => 1,
                    'exit_type'     => 1,
                    'created_by'    => auth()->user()->id,
                    'updated_by'    => auth()->user()->id,
                    'created_at'    => now(),
                    'updated_at'    => now(),
                ]
            );
        }
    }

    public function exitProdSub($type)
    {

        $gold = GoldbarOwnership::where('user_id', auth()->user()->id)->where('item_id', $type)->where('active_ownership', 1)->first();

        if ($gold->cart) {

            $outCart = $gold->cart->where('exit_type', 1)->where('item_id', $type)->first();
            if ($outCart) {

                if ($outCart->prod_qty != 1) {
                    $outCart->prod_qty -= 1;
                    $outCart->save();
                } else
                    $outCart->delete();
            }
        }
    }




    public function buyback()
    {
        if ($this->buybackStatus == 1) {
            $this->buybackStatus = 0;
        } else if ($this->buybackStatus == 0) {
            $this->buybackStatus = 1;
        }
    }


    public function outright()
    {
        if ($this->total_weight >= 1 &&  (floor($this->total_weight) == $this->total_weight)) {
            if ($this->buybackStatus == 1) {

                session()->flash('outright', 2);
            } else if ($this->buybackStatus == 0) {

                session()->flash('outright', 1);
            }

            return redirect('bb-gold-cart');
        } else {
            session()->flash('error');
            session()->flash('title', 'Invalid Quantity!');
            session()->flash('message', 'The total weight must be in 1 gram denomination!');
        }
    }

    public function render()
    {
        $this->total_weight = 0;
        $this->total = 0;


        $goldtype = InvInfo::all();
        $this->goldOwnership = GoldbarOwnership::where('user_id', auth()->user()->id)->where('active_ownership', 1)->groupBy('item_id')->select('item_id', DB::raw('count(*) as total'))->get();

        $cartInfo = InvCart::where('user_id', auth()->user()->id)->where('exit_type', 1)->get();
        foreach ($cartInfo as $cartItems) {
            $this->total_weight += $cartItems->products->prod_weight * $cartItems->prod_qty;
            if ($this->total_weight >= 1 && (floor($this->total_weight) == $this->total_weight)) {
                $this->total = $this->total_weight * 310;
            }
        }





        // $goldOwnershipCnt = GoldbarOwnership::groupBy('item_id')->select('item_id', DB::raw('count(*) as total'))->get();
        // foreach ($goldOwnershipCnt as $items)
        //     dump($items);
        // foreach ($this->goldOwnership as $item) {
        // }
        return view('livewire.page.physical-gold.outright-checkout', [
            'gtype' => $goldtype,
            'goldO' => $this->goldOwnership,
        ]);
    }
}
