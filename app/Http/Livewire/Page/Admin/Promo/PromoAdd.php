<?php

namespace App\Http\Livewire\Page\Admin\Promo;

use App\Models\InvItem;
use App\Models\Promotion;
use Livewire\Component;

class PromoAdd extends Component
{
    public $items;
    public $type, $name, $start_date, $end_date, $description, $item_id, $promo_price, $promo_code;

    public function mount()
    {
        $this->items = InvItem::all();
    }

    public function save()
    {
        $data = $this->validate([
            'type' => 'required|not_in:0',
            'name' => 'required|min:3|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'description' => 'required|min:5|string',
            'item_id' => 'required_if:type,1',
            'promo_price' => 'sometimes|required_if:type,1|nullable|numeric',
            'promo_code' => 'required_if:type,2|max:6'
        ]);

        Promotion::create($data);

        session()->flash('success');
        session()->flash('title', 'Success!');
        session()->flash('message', 'Promotion successfully Added.');
        return redirect()->route('admin.list-promotion');
    }

    public function render()
    {
        return view('livewire.page.admin.promo.promo-add')->extends('default.default');
    }
}
