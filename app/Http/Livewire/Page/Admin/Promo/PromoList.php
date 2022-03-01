<?php

namespace App\Http\Livewire\Page\Admin\Promo;

use App\Models\Promotion;
use Livewire\Component;

class PromoList extends Component
{
    public function render()
    {
        return view('livewire.page.admin.promo.promo-list', [
            'lists' => Promotion::all(),
        ])->extends('default.default');
    }
}
