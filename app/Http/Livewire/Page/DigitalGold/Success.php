<?php

namespace App\Http\Livewire\Page\DigitalGold;

use App\Models\ToyyibBills;
use Livewire\Component;
use Livewire\WithPagination;


class Success extends Component
{
    use WithPagination;

    public $totalGrammage;

    public function mount()
    {
        $this->totalGrammage = 0;
    }

    public function render()
    {
        return view('livewire.page.digital-gold.success', [
            'historyS' => ToyyibBills::where('created_by', auth()->user()->id)->where('status', 1)
                ->paginate(5),
        ]);
    }
}
