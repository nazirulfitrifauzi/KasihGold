<?php

namespace App\View\Components\btn;

use Illuminate\View\Component;

class TooltipBtn extends Component
{
    public $btnRoute;
    public $tooltipTitle;

    public function __construct($btnRoute,$tooltipTitle)
    {
        $this->btnRoute = $btnRoute;
        $this->tooltipTitle = $tooltipTitle;
    }

    public function render()
    {
        return view('components.btn.tooltip-btn');
    }
}
