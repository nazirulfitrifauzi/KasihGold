<?php

namespace App\Http\Livewire\Page\Kap;

use App\Models\GoldbarOwnership;
use Livewire\Component;

class TodaysTransaction extends Component
{
    public function render()
    {
        return view('livewire.page.kap.todays-transaction', [
            // 'list' => GoldbarOwnership::whereDate('created_at', '=', now()->format('Y-m-d'))->get(),
            'list' => GoldbarOwnership::whereDate('created_at', '=', now()->format('Y-m-d'))
                ->get(),
        ]);
    }
}
