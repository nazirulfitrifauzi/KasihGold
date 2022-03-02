<?php

namespace App\Http\Livewire\Page\Shop;

use App\Models\InvCart;
use App\Models\InvInfo;
use App\Models\InvMaster;
use App\Models\User;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;

class ProductDetail extends Component
{
    public $iid;
    public $prod_qty;

    public function mount()
    {
        $this->prod_qty = 1;
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

    public function addCart($qty)
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

    public function buyNow($qty)
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

        return redirect('cart');
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
