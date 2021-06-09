<?php

namespace App\View\Components\regtab;

use Illuminate\View\Component;

class NavContent extends Component
{
    public $name;

    public function __construct($name)
    {
        $this->name = $name;
    }
    public function render()
    {
        return view('components.regtab.nav-content');
    }
}
