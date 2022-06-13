<?php

use App\Models\GoldbarOwnership;
use Livewire\Component;

class DigitalGold extends Component
{
    public $goldInfo;
    public $tGold, $tPrice;
    public $goldInfoD;
    public $tGoldD, $tPriceD;
    public $tGoldS, $tPriceS;
    public $tGoldN;
    // public $history, $historyS, $historyP, $historyF;
    // public $outright, $bb;

    public function mount()
    {
        $goldInfo = GoldbarOwnership::where('user_id', auth()->user()->id)->where('active_ownership', 1)->where('weight', '<>', '4.25')->where('spot_gold', 0)->get();
        foreach ($goldInfo as $golds) {
            $this->tGoldN += $golds->weight;
            $this->tGold += $golds->weight;
            $this->tPrice += $golds->bought_price;
        }
        $goldInfoD = GoldbarOwnership::where('user_id', auth()->user()->id)->where('active_ownership', 1)->where('weight', '4.25')->get();
        foreach ($goldInfoD as $golds) {
            $this->tGoldD += $golds->weight;
            $this->tGold += $golds->weight;
            $this->tPriceD += $golds->bought_price;
        }

        $goldInfoS = GoldbarOwnership::where('user_id', auth()->user()->id)->where('active_ownership', 1)->where('spot_gold', 1)->get();
        foreach ($goldInfoS as $golds) {
            $this->tGoldS += $golds->available_weight;
            $this->tPriceS += $golds->bought_price;
            $this->tGold += $golds->available_weight;
        }
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
