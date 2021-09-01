<?php

namespace App\Http\Livewire\Page\PhysicalGold;

use App\Models\PhysicalConvert;
use Livewire\Component;
use Livewire\WithPagination;

class PhysicalGold extends Component
{
    use WithPagination;

    public $totalExit, $totalGrammage, $one_gram, $quarter_gram;

    public function mount()
    {
        $this->totalGrammage = 0;
        $this->totalExit = PhysicalConvert::where('user_id', auth()->user()->id)
            ->where('status', 1)
            ->get();

        foreach ($this->totalExit as $exit) {
            $this->totalGrammage += $exit->one_gram + ($exit->quarter_gram * 0.25);
            $this->one_gram += $exit->one_gram;
            $this->quarter_gram += $exit->quarter_gram;
        }
    }

    public function render()
    {

        return view('livewire.page.physical-gold.physical-gold', [

            'exit' => PhysicalConvert::where('user_id', auth()->user()->id)
                ->where('status', 1)
                ->orderBy('created_at', 'desc')
                ->paginate(5),
        ]);
    }
}
