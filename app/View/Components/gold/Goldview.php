<?php

namespace App\View\Components\gold;

use Illuminate\View\Component;

class Goldview extends Component
{
    public $percentage ;
    public function __construct($percentage)
    {
        $this->percentage = $percentage;
    }
    public function render()
    {
        return view('components.gold.goldview');
    }
}
