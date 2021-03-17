<?php

namespace App\View\Components\sidebar;

use Illuminate\View\Component;

class DropdownItem extends Component
{
    
    public $title;
    public $route;
    public $uri;

    public function __construct($title,$uri,$route)
    {
        
        $this->title = $title;
        $this->uri = $uri;
        $this->route = $route;
        
    }


    public function render()
    {
        return view('components.sidebar.dropdown-item');
    }
}
