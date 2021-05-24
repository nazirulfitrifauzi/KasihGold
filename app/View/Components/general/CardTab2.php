<?php

namespace App\View\Components\general;

use Illuminate\View\Component;

class CardTab2 extends Component
{
    public $route;

    public function __construct($route)
    {
       $this->route = $route;
    }

   
    public function render()
    {
        return view('components.general.card-tab2');
    }
}
