<?php

namespace App\View\Components\feeds;

use Illuminate\View\Component;

class Feeds extends Component
{
    public $line;
    public $iconBg;
    public $title;
    public $date;

    public function __construct($line,$iconBg,$title,$date)
    {
        $this->line = $line;
        $this->iconBg = $iconBg;
        $this->title = $title;
        $this->date = $date;
    }

    public function render()
    {
        return view('components.feeds.feeds');
    }
}
