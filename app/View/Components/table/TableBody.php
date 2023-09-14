<?php

namespace App\View\Components\table;

use Illuminate\View\Component;

class TableBody extends Component
{
    public $colspan;
    public $rowspan;

    public function __construct($colspan="", $rowspan="")
    {
        $this->colspan = $colspan;
        $this->$rowspan = $rowspan;
    }
    public function render()
    {
        return view('components.table.table-body');
    }
}
