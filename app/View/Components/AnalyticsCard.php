<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AnalyticsCard extends Component
{
    public $percentage;
    public $title;
    public $value;

    public function __construct($title,$percentage,$value)
    {
        $this->title = $title;
        $this->percentage = $percentage;
        $this->value = $value;
    }

    public function render()
    {
        return view('components.analytics-card');
    }
}
