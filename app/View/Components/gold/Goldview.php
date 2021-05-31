<?php

namespace App\View\Components\gold;

use Illuminate\View\Component;

class Goldview extends Component
{
    public $percentage ;
    public $type ;
    public $totalGram;
    public $reachGram;

    public function __construct($percentage,$type,$totalGram,$reachGram)
    {
        $this->percentage = $percentage;
        $this->type = $type;
        $this->totalGram = $totalGram;
        $this->reachGram = $reachGram;
    }
    public function render()
    {
        return view('components.gold.goldview');
    }
}
