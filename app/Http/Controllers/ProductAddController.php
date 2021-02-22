<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductAddController extends Controller
{
    public function index()
    {
        return view('pages.shop.product-add');
    }
}
