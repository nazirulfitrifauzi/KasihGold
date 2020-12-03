<?php

namespace App\View\Components\general;

use Illuminate\View\Component;

class CardTab extends Component
{
    public $countTab;
    
    public function __construct($countTab)
    {
        $this->countTab = $countTab;
    }

   
    public function render()
    {
        return view('components.general.card-tab');
    }
}
