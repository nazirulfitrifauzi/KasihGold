<?php

namespace App\Http\Livewire\Page\PhysicalGold;

use App\Models\GoldbarOwnership;
use App\Models\InvCart;
use App\Models\InvInfo;
use App\Models\OutrightPrice;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class OutrightCheckout extends Component
{

    public $prod_qty, $type, $total, $total_weight, $gross_weight, $buybackStatus;
    public $goldOwnership, $beyond1G, $originalVariance, $OVWeight;

    public function mount()
    {
        $this->buybackStatus = 0;
    }

    public function exitProdAdd($type)
    {
        $goldQty = GoldbarOwnership::where('user_id', auth()->user()->id)->where('item_id', $type)->groupBy('item_id')->select('item_id', DB::raw('count(*) as total'))->first();

        $exitCart = InvCart::where('user_id', auth()->user()->id)->where('exit_type', 1)->where('item_id', $type)->first();

        if ($exitCart) {

            if ($goldQty->total > $exitCart->prod_qty) {
                $exitCart->prod_qty += 1;
                $exitCart->save();
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
    }

    public function exitProdSub($type)
    {

        $gold = GoldbarOwnership::where('user_id', auth()->user()->id)->where('item_id', $type)->where('active_ownership', 1)->first();
        $exitCart = InvCart::where('user_id', auth()->user()->id)->where('exit_type', 1)->where('item_id', $type)->first();


        if ($exitCart) {



            if ($exitCart->prod_qty != 1) {
                $exitCart->prod_qty -= 1;
                $exitCart->save();
            } else
                $exitCart->delete();
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
        if (($this->originalVariance == 1) || ($this->OVWeight == 0 && $this->beyond1G == 1)) {
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

        $Oprice1g = OutrightPrice::select('price')->where('item_id', 9)->first();
        $totalBg = 0;
        $this->total_weight = 0;
        $this->gross_weight = 0;
        $this->total = 0;

        $this->beyond1G = 0;
        $this->originalVariance = 0; //check if the normal variance meets the 1g denomination requirements
        $this->OVWeight = 0;


        $goldtype = InvInfo::all();
        $this->goldOwnership = GoldbarOwnership::where('user_id', auth()->user()->id)->where('active_ownership', 1)->groupBy('item_id')->select('item_id', DB::raw('count(*) as total'))->get();


        $cartInfo = InvCart::where('user_id', auth()->user()->id)->where('exit_type', 1)->get();
        foreach ($cartInfo as $cartItems) {

            if (($cartItems->products->prod_weight > 1)) {
                $this->total_weight += $cartItems->products->prod_weight * $cartItems->prod_qty;
                $this->gross_weight += $cartItems->products->prod_weight * $cartItems->prod_qty;
                $totalBg += ($cartItems->outright_price->price * $cartItems->prod_qty);
                $this->beyond1G = 1;
            } else {
                $this->OVWeight += $cartItems->products->prod_weight * $cartItems->prod_qty;
                $this->gross_weight += $cartItems->products->prod_weight * $cartItems->prod_qty;
            }
        }

        if ($this->OVWeight >= 1 && (floor($this->OVWeight) == $this->OVWeight)) {
            $this->originalVariance = 1;
            $this->total_weight += $this->OVWeight;
        } else {
            $this->originalVariance = 0;
        }


        if (($this->originalVariance == 1) || ($this->OVWeight == 0 && $this->beyond1G == 1)) {
            $this->total = ($this->OVWeight * $Oprice1g->price) + $totalBg;
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
