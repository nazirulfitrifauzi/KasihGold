<?php

namespace App\View\Components\sidebar;

use Illuminate\View\Component;

class NavItem extends Component
{
    public $title;
    public $route;
    public $name;

    public function __construct($title,$route,$name)
    {
        $this->title = $title;
        $this->route = $route;
        $this->name = $name;
    }

    
    public function render()
    {
        return view('components.sidebar.nav-item');
    }
}
