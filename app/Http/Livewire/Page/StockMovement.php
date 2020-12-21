<?php

namespace App\Http\Livewire\Page;

use App\Models\InvMovement;
use Livewire\Component;

class StockMovement extends Component
{
    public function render()
    {
        return view('livewire.page.stock-movement', [
            'data' => InvMovement::where('owner_id', auth()->user()->id)->get()
        ]);
    }
}
