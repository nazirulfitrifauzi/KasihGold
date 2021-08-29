<?php

namespace App\Http\Livewire\Page\DigitalGold;

use App\Models\ToyyibBills;
use Livewire\Component;
use Livewire\WithPagination;


class Fail extends Component
{
    use WithPagination;

    public $totalGrammage;

    public function mount()
    {
        $this->totalGrammage = 0;
    }

    public function render()
    {
        return view('livewire.page.digital-gold.fail', [
            'historyF' => ToyyibBills::where('created_by', auth()->user()->id)->where('status', 3)
                ->orderBy('created_at', 'desc')
                ->paginate(5),
        ]);
    }
}
