<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PhysicalGoldController extends Controller
{
    public function index()
    {
        return view ('pages.physical-gold.physical-gold');
    }
}
