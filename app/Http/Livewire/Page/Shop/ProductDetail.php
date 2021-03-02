<?php

namespace App\Http\Livewire\Page\Shop;

use App\Models\InvInfo;
use App\Models\User;
use Livewire\Component;

class ProductDetail extends Component
{
    public $iid;

    public function render()
    {
        $productDetails = InvInfo::where('id', $this->iid)->first();
        $sellerInfo = User::where('id', $productDetails->user_id)->first();

        return view('livewire.page.shop.product-detail', [
            'info' => $productDetails,
            'userInfo' => $sellerInfo,
        ]);
    }
}
