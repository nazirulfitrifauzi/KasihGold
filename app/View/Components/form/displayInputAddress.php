<?php

namespace App\View\Components\form;

use Illuminate\View\Component;

class displayInputAddress extends Component
{
    public $label;
    public $address1;
    public $address2;
    public $address3;
    public $town;
    public $postcode;
    public $state;

    public function __construct($label, $address1, $address2, $address3, $town, $postcode, $state)
    {
        $this->label = $label;
        $this->address1 = $address1;
        $this->address2 = $address2;
        $this->address3 = $address3;
        $this->town = $town;
        $this->postcode = $postcode;
        $this->state = $state;
    }

    public function render()
    {
        return view('components.form.display-input-address');
    }
}
