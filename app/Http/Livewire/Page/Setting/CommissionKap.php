<?php

namespace App\Http\Livewire\Page\Setting;

use App\Models\CommissionRateKap;
use App\Models\InvItem;
use Livewire\Component;

class CommissionKap extends Component
{
    public $items;

    public function mount()
    {
        $this->items = InvItem::leftJoin('commission_rate_kaps', 'inv_items.id', '=', 'commission_rate_kaps.item_id')
                        ->select('inv_items.*','commission_rate_kaps.agent_rate')
                        ->where('inv_items.client', 2)
                        ->get();
    }

    protected $rules = [
        'items.*.agent_rate' => 'required',
    ];

    public function updateRate($key, $itemID)
    {
        $data = $this->validate([
            'items.*.agent_rate'          => 'required',
        ]);

        CommissionRateKap::updateOrCreate([
            'item_id' => $itemID
        ], [
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
        return view('livewire.page.setting.commission-kap');
    }
}
