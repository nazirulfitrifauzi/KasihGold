<?php

namespace App\Http\Livewire\Page\DigitalGold;

use App\Models\ToyyibBills;
use Livewire\Component;
use Livewire\WithPagination;


class Pending extends Component
{
    use WithPagination;

    public $totalGrammage;

    public function mount()
    {
        $this->totalGrammage = 0;
    }

    public function render()
    {
        return view('livewire.page.digital-gold.pending', [
            'historyP' => ToyyibBills::where('created_by', auth()->user()->id)->where('status', 2)
                ->paginate(5),
        ]);
    }
}
