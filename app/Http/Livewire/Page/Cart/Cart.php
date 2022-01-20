<?php

namespace App\Http\Livewire\Page\Cart;

use App\Models\CommissionRateKap;
use App\Models\InvCart;
use App\Models\MarketPrice;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Cart extends Component
{
    public $prod_qty, $type;
    public $total, $comm;
    public $karts, $marketP, $commR;
    public $info_061, $info_062, $info_063, $info_064, $info_065;
    public $qty_061, $qty_062, $qty_063, $qty_064, $qty_065;


    public function mount()
    {
    }

    public function subProd($cartID)
    {
        $cartItem = InvCart::where('id', $cartID)->first();
        $this->total -= $cartItem->products->item->marketPrice->price;
        if ((auth()->user()->isAgentKAP())) {
            $this->comm -= $cartItem->commission->agent_rate;
        }
        if ($cartItem->prod_qty != 1) {
            $cartItem->prod_qty -= 1;
            $cartItem->save();
        } else {
            $cartItem->delete();
        }
    }

    public function addProd($cartID)
    {
        $cartItem = InvCart::where('id', $cartID)->first();
        $this->total += $cartItem->products->item->marketPrice->price;
        if ((auth()->user()->isAgentKAP())) {
            $this->comm += $cartItem->commission->agent_rate;
        }
        if ($cartItem->prod_qty != 99) {
            $cartItem->prod_qty += 1;
            $cartItem->save();
        } else {
            $cartItem->delete();
        }
    }


    public function render()
    {
        $this->total = 0;
        $this->comm = 0;
        $this->karts = InvCart::where('user_id', auth()->user()->id)->get();

        foreach ($this->karts as $kart) {

            $this->total += $kart->products->item->marketPrice->price * $kart->prod_qty;

            if ((auth()->user()->isAgentKAP())) {
                $this->comm += $kart->commission->agent_rate * $kart->prod_qty;
            }
        }
        return view('livewire.page.cart.cart');
    }
}
