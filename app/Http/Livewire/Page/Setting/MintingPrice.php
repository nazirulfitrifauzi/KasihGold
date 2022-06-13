<?php

namespace App\Http\Livewire\Page\Setting;

use Livewire\Component;

class MintingPrice extends Component
{

    public $items;

    public function mount()
    {
        $this->items = SpotGoldPricing::all();
    }

    protected $rules = [
        'items.*' => 'required',
        'items.*.id' => 'required',
        'items.*.percentage' => 'required|between:0.01,99.99',
    ];

    public function submit()
    {
        $this->validate();

        $max = $this->items->count();
        for ($x = 0; $x < $max; $x++) {
            SpotGoldPricing::updateOrCreate([
                'id'       => $this->items[$x]['id']
            ], [
                'percentage'    => $this->items[$x]['percentage'],
                'updated_at'    => now(),
            ]);
        }

        session()->flash('success');
        session()->flash('title', 'Success!');
        session()->flash('message', 'Spot Gold Mark Up Percentage successfully updated.');
    }



    public function render()
    {
        return view('livewire.page.setting.minting-price');
    }
}
