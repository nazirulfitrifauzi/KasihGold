<?php

namespace App\View\Components;

use Illuminate\View\Component;

class NoteCard extends Component
{
    

    public function __construct()
    {
        
    }

    public function render()
    {
        return view('components.note-card');
    }
}
