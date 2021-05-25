<?php

namespace App\View\Components\toaster;

use Illuminate\View\Component;

class Info extends Component
{
    public $title, $message;

    public function __construct($title, $message)
    {
        $this->title = $title;
        $this->message = $message;
    }


    public function render()
    {
        return view('components.toaster.info');
    }
}
