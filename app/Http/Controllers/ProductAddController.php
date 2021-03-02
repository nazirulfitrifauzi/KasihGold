<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductAddController extends Controller
{
    public function index()
    {
        return view('pages.shop.product-add');
    }

    public function admin()
    {
        return view('pages.admin.product-sell-hq');
    }

    public function adminAdd()
    {
        return view('pages.admin.product-add-hq');
    }
}
