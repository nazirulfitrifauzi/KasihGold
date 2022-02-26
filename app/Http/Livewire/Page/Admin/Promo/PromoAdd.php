<?php

namespace App\Http\Livewire\Page\Admin\Promo;

use App\Models\Promotion;
use Livewire\Component;

class PromoAdd extends Component
{
    public $type, $name, $start_date, $end_date, $description;

    public function save()
    {
        $data = $this->validate([
            'type' => 'required|not_in:0',
            'name' => 'required|min:3|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'description' => 'required|min:5|string'
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
