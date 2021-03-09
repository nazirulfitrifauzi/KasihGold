<?php

namespace App\Http\Livewire\Page\Shop;

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

    public function render()
    {
        $masterProducts = InvMaster::join('inv_items', 'inv_items.id', '=', 'inv_masters.item_id')
            ->join('inv_info', 'inv_info.prod_code', '=', 'inv_items.code')
            ->where('inv_info.id', $this->iid)
            ->get();
        $productDetails = $masterProducts->first();
        $sellerInfo = User::where('id', $productDetails->user_id)->first();

        return view('livewire.page.shop.product-detail', [
            'info' => $productDetails,
            'totalProduct' => $masterProducts,
            'userInfo' => $sellerInfo,
        ]);
    }
}
