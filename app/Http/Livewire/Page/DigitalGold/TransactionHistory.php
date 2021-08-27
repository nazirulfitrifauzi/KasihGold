<?php

namespace App\Http\Livewire\Page\DigitalGold;

use App\Models\ToyyibBills;
use Livewire\Component;
use Livewire\WithPagination;


class TransactionHistory extends Component
{
    use WithPagination;
    public $totalGrammage;

    public function mount()
    {
        $this->totalGrammage = 0;
    }

    public function render()
    {
        return view('livewire.page.digital-gold.transaction-history', [
            'history' => ToyyibBills::where('created_by', auth()->user()->id)
                ->paginate(5),
        ]);
    }
}
