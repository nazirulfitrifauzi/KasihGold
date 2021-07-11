<?php

namespace App\View\Components\sidebar;

use Illuminate\View\Component;

class NavItem extends Component
{
    public $title;
    public $route;
    public $uri;
    public $target;

    public function __construct($title,$route,$uri,$target="")
    {
        $this->title = $title;
        $this->route = $route;
        $this->uri = $uri;
        $this->target = $target;
    }


    public function render()
    {
        return view('components.sidebar.nav-item');
    }
}
