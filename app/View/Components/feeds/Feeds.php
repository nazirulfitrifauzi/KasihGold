<?php

namespace App\View\Components\feeds;

use Illuminate\View\Component;

class Feeds extends Component
{
    public $line;
    public $iconBg;
    public $title;
    public $subtitle;
    public $date;
    public $tracking;

    public function __construct($line, $iconBg, $date, $title, $subtitle = "", $tracking = "no")
    {
        $this->line     = $line;
        $this->iconBg   = $iconBg;
        $this->title    = $title;
        $this->subtitle = $subtitle;
        $this->date     = $date;
        $this->tracking = $tracking;
    }

    public function render()
    {
        return view('components.feeds.feeds');
    }
}
