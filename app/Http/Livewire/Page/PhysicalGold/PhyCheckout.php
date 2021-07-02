<?php

namespace App\Http\Livewire\Page\PhysicalGold;

use App\Models\GoldbarOwnership;
use Livewire\Component;

class PhyCheckout extends Component
{
    public $prod_qty, $type, $totalGoldbar, $gb63, $gb64, $goldbar063, $goldbar064, $total;


    public function mount()
    {
        $this->totalGoldbar = GoldbarOwnership::where('user_id', auth()->user()->id)->where('active_ownership', 1)->get();

        foreach ($this->totalGoldbar as $tGold) {
            $this->total += $tGold->weight;
        }

        $this->gb63 = intval($this->total / 0.25); //3 will have 12
        $this->gb64 = intval($this->total / 1);   // 3 will have 3

        $this->goldbar063 = 0;
        $this->goldbar064 = 0;
    }

    public function exitProd($prod_qty, $type)
    {
        if ($type == "1.00") {
            if ((($this->goldbar064 + ($prod_qty)) + ($this->goldbar063 * 0.25)) > $this->total) {
                session()->flash('error');
                session()->flash('title', 'Invalid Quantity!');
                session()->flash('message', 'You cannot exceed more than what you own.');
            } else
                $this->goldbar064 = $this->goldbar064 + ($prod_qty);
        }
        if ($type == "0.25") {
            if (((($this->goldbar063 + ($prod_qty)) * 0.25) + $this->goldbar064) > $this->total) {
                session()->flash('error');
                session()->flash('title', 'Invalid Quantity!');
                session()->flash('message', 'You cannot exceed more than what you own.');
            } else
                $this->goldbar063 = $this->goldbar063 + ($prod_qty);
        }
    }

    public function render()
    {
        return view('livewire.page.physical-gold.phy-checkout');
    }
}
