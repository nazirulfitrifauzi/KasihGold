<?php

namespace App\View\Components\form;

use Illuminate\View\Component;

class Input extends Component
{
    public $label;
    public $placeholder;
    public $value;
    public $type;
    public $disable;

    public function __construct($label, $value, $placeholder = "", $type = "text", $disable = "false")
    {
        $this->label            = $label;
        $this->placeholder      = $placeholder;
        $this->value            = $value;
        $this->type             = $type;
        $this->disable          = $disable;
    }
    public function render()
    {
        return view('components.form.input');
    }
}
