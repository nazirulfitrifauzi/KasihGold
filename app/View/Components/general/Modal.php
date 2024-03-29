<?php

namespace App\View\Components\general;

use Illuminate\View\Component;

class Modal extends Component
{
    public $title;
    public $modalActive;
    public $modalSize;
    
    public function __construct($title,$modalActive,$modalSize)
    {
        $this->title = $title;
        $this->modalActive = $modalActive;
        $this->modalSize = $modalSize;
    }

    
    public function render()
    {
        return view('components.general.modal');
    }
}
