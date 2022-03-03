<?php

namespace App\Http\Livewire\Page\Shop;

use App\Models\InvCart;
use App\Models\InvInfo;
use App\Models\InvMaster;
use App\Models\MarketPrice;
use App\Models\User;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;

use Livewire\Component;

class ProductDetail extends Component
{
    public $iid;
    public $prod_qty;
    public $spotGold, $spotGram;

    public function mount()
    {
        $this->prod_qty = 1;
        $this->spotGram = 0;
        $goldInfo = InvInfo::select('prod_cat')->where('item_id', $this->iid)->first();

        if ($goldInfo->prod_cat == 3) {
            $this->spotGold = 1;
        }
    }

    public function addQty()
    {
        if ($this->prod_qty < 99) {
            $this->prod_qty++;
        }
    }

    public function subQty()
    {
        if ($this->prod_qty > 1) {
            $this->prod_qty--;
        }
    }

    public function addCart()
    {
        InvCart::updateOrCreate(
            [
                'user_id'       => auth()->user()->id,
                'item_id'       => $this->iid,
            ],
            [
                'user_id'       => auth()->user()->id,
                'item_id'       => $this->iid,
                'prod_qty'      => $this->prod_qty,
                'created_by'    => auth()->user()->id,
                'updated_by'    => auth()->user()->id,
                'created_at'    => now(),
                'updated_at'    => now(),
            ]
        );

        session()->flash('success');
        session()->flash('title', 'Success!');
        session()->flash('message', 'Your cart has been updated.');

        return redirect('product/detail?iid=' . $this->iid);
    }

    public function buyNow()
    {
        if ($this->spotGold == 1) {

            InvCart::updateOrCreate(
                [
                    'user_id'       => auth()->user()->id,
                    'item_id'       => $this->iid,
                ],
                [
                    'user_id'       => auth()->user()->id,
                    'item_id'       => $this->iid,
                    'prod_qty'      => $this->prod_qty,
                    'prod_gram'     => $this->spotGram,
                    'created_by'    => auth()->user()->id,
                    'updated_by'    => auth()->user()->id,
                    'created_at'    => now(),
                    'updated_at'    => now(),
                ]
            );
            return redirect()->route('product-buy');
        } else {
            InvCart::updateOrCreate(
                [
                    'user_id'       => auth()->user()->id,
                    'item_id'       => $this->iid,
                ],
                [
                    'user_id'       => auth()->user()->id,
                    'item_id'       => $this->iid,
                    'prod_qty'      => $this->prod_qty,
                    'created_by'    => auth()->user()->id,
                    'updated_by'    => auth()->user()->id,
                    'created_at'    => now(),
                    'updated_at'    => now(),
                ]
            );

            return redirect('cart');
        }
    }

    public function render()
    {
        if (auth()->user()->isAgentKAP() || auth()->user()->isUserKAP()) { //kap bukan admin
            $masterProducts = InvInfo::where('item_id', $this->iid)->first();
            return view('livewire.page.shop.product-detail', [
                'info' => $masterProducts,
            ]);
        } else { // KG Customer, agent, admin dashboard
            return redirect('home');
        }
    }
}
