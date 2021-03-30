<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UplineController extends Controller
{
    public function index()
    {
        return view('pages.upline.upline-detail');
    }
}
