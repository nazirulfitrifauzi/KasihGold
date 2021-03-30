<?php

namespace App\View\Components\card;

use Illuminate\View\Component;

class CardList extends Component
{
    public $value;
    public $title;
    public function __construct($title,$value)
    {
        $this->value = $value;
        $this->title = $title;
    }

    
    public function render()
    {
        return view('components.card.card-list');
    }
}
