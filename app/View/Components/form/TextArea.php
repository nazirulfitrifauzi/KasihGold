<?php

namespace App\View\Components\form;

use Illuminate\View\Component;

class TextArea extends Component
{
    public $value;
    
    public function __construct($value)
    {
        $this->value    = $value;
    }

    
    public function render()
    {
        return view('components.form.text-area');
    }
}
