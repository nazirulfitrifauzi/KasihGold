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
        'items.*' => 'required',
        'items.*.id' => 'required',
        'items.*.agent_rate' => 'required|between:0.01,99.99',
    ];

    public function submit()
    {
        $this->validate();

        $max = $this->items->count();
        for ($x = 0; $x < $max; $x++) {
            CommissionRateKap::updateOrCreate([
                'item_id'       => $this->items[$x]['id']
            ], [
                'agent_rate'    => $this->items[$x]['agent_rate'],
                'created_by'    => auth()->user()->id,
                'created_at'    => now(),
            ]);
        }

        session()->flash('success');
        session()->flash('title', 'Success!');
        session()->flash('message', 'Commission Rate successfully updated.');
    }

    public function render()
    {
        return view('livewire.page.setting.commission-kap');
    }
}
