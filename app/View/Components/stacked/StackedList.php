<?php

namespace App\View\Components\stacked;

use Illuminate\View\Component;

class StackedList extends Component
{
    public $title;

    public function __construct($title)
    {
        $this->title = $title;
    }

    public function render()
    {
        return view('components.stacked.stacked-list');
    }
}
