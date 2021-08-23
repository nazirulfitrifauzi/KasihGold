<?php

namespace App\Http\Livewire\Page\Cart;

use App\Models\CommissionRateKap;
use App\Models\InvCart;
use App\Models\MarketPrice;
use Livewire\Component;

class Cart extends Component
{
    public $prod_qty, $type;
    public $total, $comm;
    public $karts, $marketP, $commR;
    public $info_061, $info_062, $info_063, $info_064;
    public $qty_061, $qty_062, $qty_063, $qty_064;


    public function mount()
    {

        $this->total = 0;
        $this->comm = 0;
        //Cart information
        $this->info_061 = InvCart::where('user_id', auth()->user()->id)->where('item_id', 10005)->first();
        $this->info_062 = InvCart::where('user_id', auth()->user()->id)->where('item_id', 10007)->first();
        $this->info_063 = InvCart::where('user_id', auth()->user()->id)->where('item_id', 10009)->first();
        $this->info_064 = InvCart::where('user_id', auth()->user()->id)->where('item_id', 10010)->first();

        //Cart specific quantity
        if ($this->info_061 != null) {
            $this->qty_061 = $this->info_061->prod_qty;
        }
        if ($this->info_062 != null) {
            $this->qty_062 = $this->info_062->prod_qty;
        }
        if ($this->info_063 != null) {
            $this->qty_063 = $this->info_063->prod_qty;
        }
        if ($this->info_064 != null) {
            $this->qty_064 = $this->info_064->prod_qty;
        }

        //Beginning to calculate the total price and commission if any.
        $this->karts = InvCart::where('user_id', auth()->user()->id)->get();
        $this->marketP = MarketPrice::all();
        $this->commR = CommissionRateKap::all();

        foreach ($this->karts as $kart) {

            $this->total += $kart->products->item->marketPrice->price * $kart->prod_qty;

            if ((auth()->user()->isAgentKAP())) {
                $this->comm += $kart->products->item->commissionKAP->agent_rate * $kart->prod_qty;
            }
        }
    }

    public function subProd($type)
    {
        if ($type == "0.01") {
            $this->total -= $this->marketP[0]->price;

            if ((auth()->user()->isAgentKAP())) {
                $this->comm -= $this->commR[0]->agent_rate;
            }
            if ($this->info_061->prod_qty == 0) {
                $this->info_061->delete();
            } else {
                $this->info_061->prod_qty -= 1;
                $this->qty_061 -= 1;
            }
            $this->info_061->save();
        }
        if ($type == "0.1") {
            $this->total -= $this->marketP[1]->price;

            if ((auth()->user()->isAgentKAP())) {
                $this->comm -= $this->commR[1]->agent_rate;
            }

            $this->info_062->prod_qty -= 1;
            $this->qty_062 -= 1;

            $this->info_062->save();
        }
        if ($type == "0.25") {
            $this->total -= $this->marketP[2]->price;

            if ((auth()->user()->isAgentKAP())) {
                $this->comm -= $this->commR[2]->agent_rate;
            }

            $this->info_063->prod_qty -= 1;
            $this->qty_063 -= 1;

            $this->info_063->save();
        }
        if ($type == "1.00") {
            $this->total -= $this->marketP[3]->price;

            if ((auth()->user()->isAgentKAP())) {
                $this->comm -= $this->commR[3]->agent_rate;
            }

            $this->info_064->prod_qty -= 1;
            $this->qty_064 -= 1;

            $this->info_064->save();
        }
    }


    public function addProd($type)
    {
        if ($type == "0.01") {
            $this->total += $this->marketP[0]->price;

            if ((auth()->user()->isAgentKAP())) {
                $this->comm += $this->commR[0]->agent_rate;
            }

            $this->info_061->prod_qty += 1;
            $this->qty_061 += 1;

            $this->info_061->save();
        }
        if ($type == "0.1") {
            $this->total += $this->marketP[1]->price;

            if ((auth()->user()->isAgentKAP())) {
                $this->comm += $this->commR[1]->agent_rate;
            }

            $this->info_062->prod_qty += 1;
            $this->qty_062 += 1;

            $this->info_062->save();
        }
        if ($type == "0.25") {
            $this->total += $this->marketP[2]->price;

            if ((auth()->user()->isAgentKAP())) {
                $this->comm += $this->commR[2]->agent_rate;
            }

            $this->info_063->prod_qty += 1;
            $this->qty_063 += 1;

            $this->info_063->save();
        }
        if ($type == "1.00") {
            $this->total += $this->marketP[3]->price;

            if ((auth()->user()->isAgentKAP())) {
                $this->comm += $this->commR[3]->agent_rate;
            }

            $this->info_064->prod_qty += 1;
            $this->qty_064 += 1;

            $this->info_064->save();
        }
    }

    public function render()
    {
        return view('livewire.page.cart.cart');
    }
}
