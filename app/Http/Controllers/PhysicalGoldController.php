<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PhysicalGoldController extends Controller
{
    public function index()
    {
        return view('pages.physical-gold.physical-gold');
    }
    public function cart()
    {
        return view('pages.physical-gold.phy-checkout');
    }
    public function ocart()
    {
        return view('pages.physical-gold.outright-checkout');
    }
    public function bbcart()
    {
        return view('pages.physical-gold.bb-checkout');
    }
    public function confirm()
    {
        return view('pages.physical-gold.phy-confirm-conversation');
    }
}
