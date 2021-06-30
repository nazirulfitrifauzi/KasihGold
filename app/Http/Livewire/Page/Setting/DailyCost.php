<?php

namespace App\Http\Livewire\Page\Setting;

use App\Models\CostDaily;
use App\Models\CostHistory;
use App\Models\InvItem;
use Livewire\Component;

class DailyCost extends Component
{
    public $items;
    public $item_id;

    protected $rules = [
        'items.*' => 'required',
        'items.*.id' => 'required',
        'items.*.cost' => 'required|between:0.01,99.99',
    ];

    public function mount()
    {
        // check data in cost daily table; if created date not same with todays date, it will delete all data.
        $this->checkData();

        $this->items = InvItem::leftJoin('cost_dailies', 'inv_items.id', '=', 'cost_dailies.item_id')
                        ->select('inv_items.*', 'cost_dailies.cost')
                        ->where('inv_items.item_type_id', '=', '1')
                        ->get();
    }

    public function checkData()
    {
        $date = CostDaily::where('item_id',1)->value('created_at');

        if ($date != null) {
            if ($date->format('Y-m-d') != now()->format('Y-m-d')) {
                $cost = CostDaily::whereNotNull('cost')->get();

                foreach ($cost as $costs) {
                    $costs->delete();
                }
            }
        }
    }

    public function submit()
    {
        $this->validate();

        $max = $this->items->count();

        // insert data to cost_dailies
        for ($x = 0; $x < $max; $x++) {
            CostDaily::updateOrCreate([
                'item_id'       => $this->items[$x]['id']
            ], [
                'cost'          => $this->items[$x]['cost'],
                'created_at'    => now(),
            ]);
        }

        // insert data to cost_histories
        for ($x = 0; $x < $max; $x++) {
            CostHistory::updateOrCreate([
                'item_id'       => $this->items[$x]['id'],
                'created_at'    => now()->format('Y-m-d'),
            ], [
                'cost'          => $this->items[$x]['cost'],
                'created_by'    => auth()->user()->id,
            ]);
        }

        session()->flash('success');
        session()->flash('title', 'Success!');
        session()->flash('message', 'Daily Cost successfully updated.');
    }

    public function render()
    {
        return view('livewire.page.setting.daily-cost');
    }
}
