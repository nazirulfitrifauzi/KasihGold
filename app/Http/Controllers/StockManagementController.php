<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StockManagementController extends Controller
{
    public function index()
    {
        return view('pages.stock.stock_management');
    }
}
