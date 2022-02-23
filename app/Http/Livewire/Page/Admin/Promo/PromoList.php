<?php

namespace App\Http\Livewire\Page\Admin\Promo;

use Livewire\Component;

class PromoList extends Component
{
    public function render()
    {
        return view('livewire.page.admin.promo.promo-list')->extends('default.default');
    }
}
