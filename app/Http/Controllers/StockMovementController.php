<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StockMovementController extends Controller
{
    public function index()
    {
        return view('pages.stock.stock_movement');
    }
}
