<?php

namespace App\Http\Livewire\Page\Shop;

use App\Models\InvInfo;
use Livewire\Component;

class ProductView extends Component
{
    public function render()
    {
        return view('livewire.page.shop.product-view', [
            'list' => InvInfo::all(),
        ]);
    }
}
