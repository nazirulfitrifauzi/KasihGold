<?php

namespace App\Http\Livewire\Page\PurchaseHistory;

use App\Models\GoldbarOwnership;
use Livewire\Component;

class PurchaseHistory extends Component
{
    public $history;

    public function mount()
    {
        $this->history = GoldbarOwnership::where('user_id', auth()->user()->id)->get();
    }

    public function render()
    {
        return view('livewire.page.purchase-history.purchase-history');
    }
}
