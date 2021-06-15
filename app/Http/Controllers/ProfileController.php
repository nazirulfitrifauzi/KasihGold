<?php

namespace App\Http\Controllers;

use App\Models\Profile_nominee;
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
        $nomineeList = Profile_nominee::where('user_id', auth()->user()->id)->orderBy('id', 'desc')->get();
        $pdf = PDF::loadView('pages.profile.nominee.nomineePDF', compact('nomineeList'))->setPaper('A4','portrait');
        return $pdf->stream();
    }
}
