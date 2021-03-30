<?php

namespace App\View\Components\card;

use Illuminate\View\Component;

class CardBg extends Component
{
    public $route;
    public $img;
    public $title;

    public function __construct($route,$img,$title)
    {
        $this->route = $route;
        $this->img = $img;
        $this->title = $title;
    }

    public function render()
    {
        return view('components.card.card-bg');
    }
}
