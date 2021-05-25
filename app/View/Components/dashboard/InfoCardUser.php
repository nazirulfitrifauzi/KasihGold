<?php

namespace App\View\Components\dashboard;

use Illuminate\View\Component;

class InfoCardUser extends Component
{
    public $cardRoute;
    public $value;
    public $title;
    public $bg;
    public $iconColor;

    public function __construct($cardRoute,$value,$title,$bg,$iconColor)
    {
        $this->cardRoute = $cardRoute;
        $this->value = $value;
        $this->title = $title;
        $this->bg = $bg;
        $this->iconColor = $iconColor;
    }
    public function render()
    {
        return view('components.dashboard.info-card-user');
    }
}
