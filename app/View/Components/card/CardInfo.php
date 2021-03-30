<?php

namespace App\View\Components\card;

use Illuminate\View\Component;

class CardInfo extends Component
{
    public $bgcolor;
    public $title;
    public $textcolor;
    public $value;
    public function __construct($bgcolor,$title,$textcolor,$value)
    {
        $this->bgcolor = $bgcolor;
        $this->title = $title;
        $this->textcolor = $textcolor;
        $this->value = $value;
    }


    public function render()
    {
        return view('components.card.card-info');
    }
}
