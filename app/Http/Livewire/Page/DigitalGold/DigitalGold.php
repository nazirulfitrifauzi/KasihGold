<?php

namespace App\Http\Livewire\Page\DigitalGold;

use App\Models\GoldbarOwnership;
use Livewire\Component;

class DigitalGold extends Component
{
    public $goldInfo;
    public $tGold, $tPrice;
    public $history;

    public function mount()
    {
        $goldInfo = GoldbarOwnership::where('user_id', auth()->user()->id)->where('active_ownership', 1)->get();
        $this->tGold = 0;
        foreach ($goldInfo as $golds) {
            $this->tGold += $golds->weight;
        }
        $this->tPrice = $this->tGold * 252;

        if(auth()->user()->isAgentKAP()) {
            $this->history = GoldbarOwnership::where('user_id', auth()->user()->id)->get();
        }
    }

    public function render()
    {
        return view('livewire.page.digital-gold.digital-gold');
    }
}
