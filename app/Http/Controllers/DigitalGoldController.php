<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DigitalGoldController extends Controller
{
    public function index()
    {
        return view ('pages.digital-gold.digital-gold');
    }
}
