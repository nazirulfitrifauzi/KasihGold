<?php

namespace App\View\Components\stacked;

use Illuminate\View\Component;

class StackedList extends Component
{
    public $title;
    public $headerTitle;

    public function __construct($title,$headerTitle)
    {
        $this->title = $title;
        $this->headerTitle = $headerTitle;
    }

    public function render()
    {
        return view('components.stacked.stacked-list');
    }
}
