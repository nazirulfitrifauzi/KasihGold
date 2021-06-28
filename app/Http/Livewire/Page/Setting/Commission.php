<?php

namespace App\Http\Livewire\Page\Setting;

use App\Models\CommissionRate;
use App\Models\InvItem;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Commission extends Component
{
    public $items;

    public function mount()
    {
        $this->items = InvItem::leftJoin('commission_rates', 'inv_items.id', '=', 'commission_rates.item_id')
        ->select('inv_items.*', 'commission_rates.md_rate', 'commission_rates.agent_rate')
        ->where('inv_items.item_type_id','=','1')
        ->get();
    }

    protected $rules = [
        'items.*.md_rate' => 'required|between:0.01,99.99',
        'items.*.agent_rate' => 'required|between:0.01,99.99',
    ];

    public function updateRate($key, $itemID)
    {
        CommissionRate::updateOrCreate([
            'item_id' => $itemID
        ], [
            'md_rate'       => $this->items[$key]['md_rate'],
            'agent_rate'    => $this->items[$key]['agent_rate'],
            'created_by'    => auth()->user()->id,
            'created_at'    => now(),
        ]);

        session()->flash('success');
        session()->flash('title', 'Success!');
        session()->flash('message', 'Commission Rate successfully updated.');
    }

    public function render()
    {
        return view('livewire.page.setting.commission');
    }
}
