<?php

namespace App\View\Components\general;

use Illuminate\View\Component;

class Modal2 extends Component
{
    public $title;
    public $modalActive;
    public $modalSize;
    public $headerbg;
    public $closeBtn;

    public function __construct($title,$modalActive,$modalSize,$headerbg ,$closeBtn ="yes")
    {
        $this->title = $title;
        $this->modalActive = $modalActive;
        $this->modalSize = $modalSize;
        $this->closeBtn = $closeBtn;
        $this->headerbg = $headerbg;
    }

    
    public function render()
    {
        return view('components.general.modal2');
    }
}
