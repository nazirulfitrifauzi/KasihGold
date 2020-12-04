<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ScreeningController extends Controller
{
    public function index()
    {
        return view('pages.admin.screening');
    }
}
