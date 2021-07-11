<?php

namespace App\View\Components\cardtab;

use Illuminate\View\Component;

class Title extends Component
{
    public $name;
    public $bg;
    public $livewire = "";

    public function __construct($name, $livewire = "",$bg)
    {
        $this->name = $name;
        $this->livewire = $livewire;
        $this->bg = $bg;
    }
    public function render()
    {
        return view('components.cardtab.title');
    }
}
