<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StockManagementController extends Controller
{
    public function index()
    {
        if (auth()->user()->role == 1 && auth()->user->client == 2) {
            return view('pages.stock.stock_management_kap');
        } else{
            return view('pages.stock.stock_management');
        }
    }
}
