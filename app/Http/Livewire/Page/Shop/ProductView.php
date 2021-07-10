<?php

namespace App\Http\Livewire\Page\Shop;

use App\Models\InvInfo;
use App\Models\InvItem;
use Livewire\Component;

class ProductView extends Component
{
    public function render()
    {
        if (auth()->user()->client == 1 ) { // user dashboard
            return view('livewire.page.shop.product-view', [
                'list' => InvInfo::where('user_id', 1)->get(),
            ]);
        } else { // agent n admin dashboard
            return view('livewire.page.shop.product-view', [
                // 'list' => InvInfo::where('user_id', 10)->get(),
                'list' => InvItem::whereClient(2)->get(),
            ]);
        }
    }
}
