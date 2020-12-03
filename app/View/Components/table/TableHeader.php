<?php

namespace App\View\Components\table;

use Illuminate\View\Component;

class TableHeader extends Component
{
    public $value;
    public $sort;
    public $livewire;

    public function __construct($value, $sort, $livewire)
    {
        $this->value = $value;
        $this->sort = $sort;
        $this->livewire = $livewire;
    }
    public function render()
    {
        return view('components.table.table-header');
    }
}
