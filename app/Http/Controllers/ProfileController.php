<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class ProfileController extends Controller
{
    public function index()
    {
        return view('pages.profile.profile');
    }

    public function nomineePDF()
    {
        $pdf = PDF::loadView('pages.profile.nominee.nomineePDF')->setPaper('A4','portrait');
        return $pdf->stream();
    }

    
}
