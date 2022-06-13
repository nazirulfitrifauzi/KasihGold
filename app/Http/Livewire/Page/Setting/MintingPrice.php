<?php

namespace App\Http\Livewire\Page\Setting;

use App\Models\MintingGoldPrice;
use Livewire\Component;

class MintingPrice extends Component
{

    public $items;

    public function mount()
    {
        $this->items = MintingGoldPrice::all();
    }

    protected $rules = [
        'items.*' => 'required',
        'items.*.id' => 'required',
        'items.*.minting_cost' => 'required|between:0.01,99.99',
    ];

    public function submit()
    {
        $this->validate();

        $max = $this->items->count();
        for ($x = 0; $x < $max; $x++) {
            MintingGoldPrice::updateOrCreate([
                'id'       => $this->items[$x]['id']
            ], [
                'minting_cost'    => $this->items[$x]['minting_cost'],
                'updated_at'    => now(),
            ]);
        }

        session()->flash('success');
        session()->flash('title', 'Success!');
        session()->flash('message', 'Minting Price successfully updated.');
    }



    public function render()
    {
        return view('livewire.page.setting.minting-price');
    }
}
