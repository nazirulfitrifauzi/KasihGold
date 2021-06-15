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

    public function addCart($prod_qty)
    {
        InvCart::updateOrCreate(
            [
                'user_id'       => auth()->user()->id,
                'item_id'       => $this->iid,
            ],
            [
                'user_id'       => auth()->user()->id,
                'item_id'       => $this->iid,
                'prod_qty'      => $prod_qty,
                'created_by'    => auth()->user()->id,
                'updated_by'    => auth()->user()->id,
                'created_at'    => now(),
                'updated_at'    => now(),
            ]
        );
    }

    public function buyNow($prod_qty)
    {
        InvCart::updateOrCreate(
            [
                'user_id'       => auth()->user()->id,
                'item_id'       => $this->iid,
            ],
            [
                'user_id'       => auth()->user()->id,
                'item_id'       => $this->iid,
                'prod_qty'      => $prod_qty,
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
        if (auth()->user()->role == '4' || auth()->user()->role == '6') { // AP Customer
            $masterProducts = InvInfo::where('inv_info.id', $this->iid)
                ->first();

            return view('livewire.page.shop.product-detail', [
                'info' => $masterProducts,
            ]);
        } else { // KG Customer, agent, admin dashboard

            $masterProducts = InvMaster::join('inv_items', 'inv_items.id', '=', 'inv_masters.item_id')
                ->join('inv_info', 'inv_info.prod_code', '=', 'inv_items.code')
                ->where('inv_info.id', $this->iid)
                ->get();
            $productDetails = $masterProducts->first();
            $sellerInfo = User::where('id', $productDetails->user_id)->first();

            return view('livewire.page.shop.product-detail', [
                'info' => $productDetails,
                'userInfo' => $sellerInfo,
            ]);
        }
    }
}
