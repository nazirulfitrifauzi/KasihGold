<?php

namespace App\Http\Livewire\Page\DigitalGold;

use App\Models\GoldbarOwnership;
use Livewire\Component;

class DigitalGold extends Component
{
    public $goldInfo;
    public $tGold, $tPrice;
    public $goldInfoD;
    public $tGoldD, $tPriceD;
    public $tGoldS, $tPriceS;
    // public $history, $historyS, $historyP, $historyF;
    // public $outright, $bb;

    public function mount()
    {
        $goldInfo = GoldbarOwnership::where('user_id', auth()->user()->id)->where('active_ownership', 1)->where('weight', '<>', '4.25')->where('spot_gold', 0)->get();
        foreach ($goldInfo as $golds) {
            $this->tGold += $golds->weight;
            $this->tPrice += $golds->bought_price;
        }
        $goldInfoD = GoldbarOwnership::where('user_id', auth()->user()->id)->where('active_ownership', 1)->where('weight', '4.25')->get();
        foreach ($goldInfoD as $golds) {
            $this->tGoldD += $golds->weight;
            $this->tPriceD += $golds->bought_price;
        }

        $goldInfo = GoldbarOwnership::where('user_id', auth()->user()->id)->where('active_ownership', 1)->where('spot_gold', 1)->get();
        foreach ($goldInfo as $golds) {
            $this->tGoldS += $golds->weight;
            $this->tPriceS += $golds->bought_price;
        }

        // $this->history = GoldbarOwnershipPending::where('user_id', auth()->user()->id)->paginate(10);
        // $this->historyS = GoldbarOwnership::where('user_id', auth()->user()->id)->get();
        // $this->historyP = GoldbarOwnershipPending::where('user_id', auth()->user()->id)->where('status', 2)->get();
        // $this->historyF = GoldbarOwnershipPending::where('user_id', auth()->user()->id)->where('status', 3)->get();
        // $this->outright = OutrightSell::where('user_id', auth()->user()->id)->get();
        // $this->bb = BuyBack::where('user_id', auth()->user()->id)->get();
    }

    public function details()
    {
        return redirect('digital-gold-details');
    }

    public function render()
    {
        return view('livewire.page.digital-gold.digital-gold');
    }
}
