<?php

namespace App\View\Components\general;

use Illuminate\View\Component;

class newModal extends Component
{
    public $modalName;
    public $size;

    public function __construct($modalName, $size)
    {
        $this->modalName = $modalName;
        $this->size = $size;
    }

    public function render()
    {
        return view('components.general.new-modal');
    }
}
