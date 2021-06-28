<?php

namespace App\Http\Livewire\Page\Setting;

use App\Models\InvItem;
use Livewire\Component;

class Commission extends Component
{
    public $items;

    public function mount()
    {
        $this->items = InvItem::where('item_type_id',1)->with('rates')->get();
    }

    protected $rules = [
        'items.*.rates.md_rate' => 'required|between:0.01,99.99',
        'items.*.rates.agent_rate' => 'required|between:0.01,99.99',
    ];

    public function hydrate()
    {
        $this->items['*']['rates']['md_rate']->jsonserialize();
        dump($this->items['*']['rates']['md_rate']);
    }

    public function render()
    {
        return view('livewire.page.setting.commission');
    }
}
