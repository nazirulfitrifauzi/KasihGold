<?php

namespace App\View\Components\dashboard;

use Illuminate\View\Component;

class InfoCard extends Component
{
    public $cardRoute;
    public $percentageBg;
    public $percentage;
    public $value;
    public $title;
    public $bg;

    public function __construct($cardRoute,$percentageBg,$percentage,$value,$title,$bg)
    {
        $this->cardRoute = $cardRoute;
        $this->percentageBg = $percentageBg;
        $this->percentage = $percentage;
        $this->value = $value;
        $this->title = $title;
        $this->bg = $bg;
    }

    
    public function render()
    {
        return view('components.dashboard.info-card');
    }
}
