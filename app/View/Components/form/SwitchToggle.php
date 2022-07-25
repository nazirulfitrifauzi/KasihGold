<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class SwitchToggle extends Component
{
    public $label;

    public function __construct($label)
    {
        $this->label = $label;
    }

    public function render()
    {
        return view('components.form.switch-toggle');
    }
}
