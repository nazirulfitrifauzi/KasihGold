<?php

namespace App\Http\Livewire\Page\Shop;

use App\Models\InvInfo;
use Livewire\Component;

class ProductView extends Component
{
    public function render()
    {
        if (auth()->user()->role == 1 || auth()->user()->role == 5 || auth()->user()->role == 3) { // user dashboard
            return view('livewire.page.shop.product-view', [
                'list' => InvInfo::where('user_id', 1)->get(),
            ]);
        } else { // agent n admin dashboard
            return view('livewire.page.shop.product-view', [
                'list' => InvInfo::where('user_id', 10)->get(),

            ]);
        }
    }
}
