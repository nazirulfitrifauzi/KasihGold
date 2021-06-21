<?php

namespace App\View\Components\settingTab;

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
        return view('components.settingTab.nav-tab');
    }
}
