<?php

namespace App\View\Components\form;

use Illuminate\View\Component;

class displayInput extends Component
{
    public $label;
    public $value;

    public function __construct($label, $value)
    {
        $this->label = $label;
        $this->value = $value;
    }

    public function render()
    {
        return view('components.form.display-input');
    }
}
