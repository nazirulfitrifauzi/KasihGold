<?php

namespace App\View\Components\popup;

use Illuminate\View\Component;

class deleteProfile extends Component
{
    public $name;
    public $variable;
    public $posturl;
    public $successText;
    public $failText;
    public $redirectUrl;

    public function __construct($name, $variable, $posturl, $successText, $failText, $redirectUrl)
    {
        $this->name = $name;
        $this->variable = $variable;
        $this->posturl = $posturl;
        $this->successText = $successText;
        $this->failText = $failText;
        $this->redirectUrl = $redirectUrl;
    }

    public function render()
    {
        return view('components.popup.delete-profile');
    }
}
