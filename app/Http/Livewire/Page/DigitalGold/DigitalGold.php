<?php

namespace App\Http\Livewire\Page\DigitalGold;

use App\Models\BuyBack;
use App\Models\GoldbarOwnership;
use App\Models\GoldbarOwnershipPending;
use App\Models\OutrightSell;
use Livewire\Component;

class DigitalGold extends Component
{
    public $goldInfo;
    public $tGold, $tPrice;
    // public $history, $historyS, $historyP, $historyF;
    // public $outright, $bb;

    public function mount()
    {
        $goldInfo = GoldbarOwnership::where('user_id', auth()->user()->id)->where('active_ownership', 1)->get();
        foreach ($goldInfo as $golds) {
            $this->tGold += $golds->weight;
            $this->tPrice += $golds->bought_price;
        }

        // $this->history = GoldbarOwnershipPending::where('user_id', auth()->user()->id)->paginate(10);
        // $this->historyS = GoldbarOwnership::where('user_id', auth()->user()->id)->get();
        // $this->historyP = GoldbarOwnershipPending::where('user_id', auth()->user()->id)->where('status', 2)->get();
        // $this->historyF = GoldbarOwnershipPending::where('user_id', auth()->user()->id)->where('status', 3)->get();
        // $this->outright = OutrightSell::where('user_id', auth()->user()->id)->get();
        // $this->bb = BuyBack::where('user_id', auth()->user()->id)->get();
    }

    public function render()
    {
        return view('livewire.page.digital-gold.digital-gold');
    }
}
