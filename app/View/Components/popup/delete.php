<?php

namespace App\View\Components\popup;

use Illuminate\View\Component;

class delete extends Component
{
    public $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function render()
    {
        return view('components.popup.delete');
    }
}
