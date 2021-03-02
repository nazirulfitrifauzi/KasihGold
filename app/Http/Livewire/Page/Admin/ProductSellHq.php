<?php

namespace App\Http\Livewire\Page\Admin;

use Livewire\Component;
use App\Models\InvInfo;

class ProductSellHq extends Component
{
    public function render()
    {
        return view('livewire.page.admin.product-sell-hq', [
            'list' => InvInfo::all(),
        ]);
    }
}
