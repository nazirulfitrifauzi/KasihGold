<?php

namespace App\Http\Livewire\Page;

use App\Models\Goldbar;
use Illuminate\Support\Str;
use Livewire\Component;

class StockKAP extends Component
{

    public $addTotalWeight;

    public function addGold()
    {
        $data = $this->validate([
            'addTotalWeight' => 'required|numeric|min:3',
        ]);

        Goldbar::create([
            'guid'              => (string) Str::uuid(),
            'total_weight'      => $this->addTotalWeight,
            'weight_occupied'   => 0.00,
            'weight_on_hold'    => 0.00,
            'weight_vacant'     => $this->addTotalWeight,
            'created_by'        => auth()->user()->id,
            'created_at'        => now(),
        ]);

        return redirect()->to('/stock/management');
    }

    public function render()
    {
        return view('livewire.page.stock-k-a-p', [
            'golds' => Goldbar::all(),
        ]);
    }
}
