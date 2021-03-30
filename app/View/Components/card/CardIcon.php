<?php

namespace App\View\Components\card;

use Illuminate\View\Component;

class CardIcon extends Component
{
    public $title;
    public $route;
    public $color;

    public function __construct($title,$color,$route)
    {
        $this->title = $title;
        $this->route = $route;
        $this->color = $color;
    }

    
    public function render()
    {
        return view('components.card.card-icon');
    }
}
