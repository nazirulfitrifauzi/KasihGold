<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductEditController extends Controller
{
    public function index()
    {
        return view('pages.shop.product-edit');
    }
}
