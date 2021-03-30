<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyNetworkController extends Controller
{
    public function index()
    {
        return view('pages.mynetwork.my-network');
    }
}
