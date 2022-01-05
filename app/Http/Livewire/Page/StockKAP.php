<?php

namespace App\Http\Livewire\Page;

use App\Models\Goldbar;
use Illuminate\Support\Str;
use Livewire\Component;

class StockKAP extends Component
{

    public $addTotalWeight, $addSerialID, $addSupplierName, $addVaultLocation, $addBoughtPrice;
    public $max;
    public function addGold()
    {
        $this->max = 13;
        $data = $this->validate([
            'addTotalWeight'     => 'required|numeric|max:' . $this->max,
            'addSerialID'        => 'required',
            'addSupplierName'    => 'required',
            'addVaultLocation'   => 'required',
            'addBoughtPrice'     => 'required|numeric',
        ]);

        Goldbar::create([
            'guid'              => (string) Str::uuid(),
            'total_weight'      => $this->addTotalWeight,
            'serial_id'         => $this->addSerialID,
            'supplier_name'     => $this->addSupplierName,
            'vault_location'    => $this->addVaultLocation,
            'bought_price'      => $this->addBoughtPrice,
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
