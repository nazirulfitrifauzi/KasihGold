<?php

namespace App\View\Components\gold;

use Illuminate\View\Component;

class Goldview extends Component
{
    public $percentage ;
    public $type ;
    public $totalGram;
    public $reachGram;
    public $name;

    public function __construct($percentage,$type,$totalGram,$reachGram , $name)
    {
        $this->percentage = $percentage;
        $this->type = $type;
        $this->totalGram = $totalGram;
        $this->reachGram = $reachGram;
        $this->name = $name;
    }
    public function render()
    {
        return view('components.gold.goldview');
    }
}
