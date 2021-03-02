<?php

namespace App\Http\Livewire\Page\Shop;

use App\Models\InvInfo;
use Livewire\Component;

class ProductSell extends Component
{
    public function render()
    {
        return view('livewire.page.shop.product-sell', [
            'list' => InvInfo::all(),
        ]);
    }
}
