<?php

namespace App\View\Components\gold;

use Illuminate\View\Component;

class Goldview extends Component
{
    public $percentage ;
    public $type ;

    public function __construct($percentage,$type)
    {
        $this->percentage = $percentage;
        $this->type = $type;
    }
    public function render()
    {
        return view('components.gold.goldview');
    }
}
