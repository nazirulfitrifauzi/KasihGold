<?php

namespace App\Http\Livewire\Page\Cart;

use App\Models\InvCart;
use Livewire\Component;

class Cart extends Component
{
    public function render()
    {
        $cartInfo = InvCart::where('user_id', auth()->user()->id)->get();

        return view('livewire.page.cart.cart', [
            'cart' => $cartInfo,
        ]);
    }
}
