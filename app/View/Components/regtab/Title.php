<?php

namespace App\View\Components\regtab;

use Illuminate\View\Component;

class Title extends Component
{
    public $name;
    public $livewire = "";

    public function __construct($name, $livewire = "")
    {
        $this->name = $name;
        $this->livewire = $livewire;
    }
    public function render()
    {
        return view('components.regtab.title');
    }
}
