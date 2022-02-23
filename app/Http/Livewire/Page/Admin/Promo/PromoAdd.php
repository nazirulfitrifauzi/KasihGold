<?php

namespace App\Http\Livewire\Page\Admin\Promo;

use Livewire\Component;

class PromoAdd extends Component
{
    public function render()
    {
        return view('livewire.page.admin.promo.promo-add')->extends('default.default');
    }
}
