<?php

namespace App\Http\Livewire\Page\Setting;

use App\Models\InvItem;
use App\Models\MarketPrice;
use Livewire\Component;

class MarketPriceKap extends Component
{
    public $items;
    public $item_id;
    public $start_date;
    public $end_date;

    public function mount()
    {
        $this->items = InvItem::leftJoin('market_prices', 'inv_items.id', '=', 'market_prices.item_id')
            ->select('inv_items.*', 'market_prices.price', 'market_prices.start_date', 'market_prices.end_date')
            ->where('inv_items.client', 2)
            ->get();
        $this->start_date = MarketPrice::orderBy('id', 'desc')->take(1)->value('start_date');
        $this->end_date = MarketPrice::orderBy('id', 'desc')->take(1)->value('end_date');
    }

    protected $rules = [
        'items.*' => 'required',
        'items.*.id' => 'required',
        'start_date' => 'required',
        'end_date' => 'required',
        'items.*.price' => 'required|between:0.01,99.99',
    ];

    public function submit()
    {
        $this->validate();

        $max = $this->items->count();
        for ($x = 0; $x < $max; $x++) {
            MarketPrice::updateOrCreate([
                'item_id'       => $this->items[$x]['id']
            ], [
                'price'         => $this->items[$x]['price'],
                'start_date'    => $this->start_date,
                'end_date'      => $this->end_date,
                'created_at'    => now(),
            ]);
        }

        session()->flash('success');
        session()->flash('title', 'Success!');
        session()->flash('message', 'Market Price successfully updated.');
    }

    public function render()
    {
        return view('livewire.page.setting.market-price-kap');
    }
}
