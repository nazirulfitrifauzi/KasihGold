<?php

namespace App\View\Components\popup;

use Illuminate\View\Component;

class delete extends Component
{
    public $name;
    public $variable;
    public $posturl;

    public function __construct($name, $variable, $posturl)
    {
        $this->name = $name;
        $this->variable = $variable;
        $this->posturl = $posturl;
    }

    public function render()
    {
        return view('components.popup.delete');
    }
}
