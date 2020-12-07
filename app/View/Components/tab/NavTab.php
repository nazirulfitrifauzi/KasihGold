<?php

namespace App\View\Components\tab;

use Illuminate\View\Component;

class NavTab extends Component
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
        return view('components.tab.nav-tab');
    }
}
