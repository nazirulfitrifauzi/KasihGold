<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductSellController extends Controller
{
    public function index()
    {
        return view('pages.shop.product-sell');
    }
}
