<?php

namespace App\Http\Livewire\Page\Kap;

use App\Models\CommissionDetailKap;
use Livewire\Component;

class Cashback extends Component
{
    public function render()
    {
        return view('livewire.page.kap.cashback', [
            'lists' => CommissionDetailKap::paginate(15),
        ]);
    }
}