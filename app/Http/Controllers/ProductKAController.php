<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductKAController extends Controller
{
    public function add()
    {
        return view('pages.shop-ka.product-add');
    }

    public function buy()
    {
        return view('pages.shop-ka.product-buy');
    }

    public function detail()
    {
        return view('pages.shop-ka.product-detail');
    }

    public function edit()
    {
        return view('pages.shop-ka.product-edit');
    }

    public function sell()
    {
        return view('pages.shop-ka.product-sell');
    }

    public function exitApp()
    {
        return view('pages.admin.exit-approval');
    }

    public function exitAppBB()
    {
        return view('pages.admin.exit-approval-b-b');
    }

    public function exitAppOutright()
    {
        return view('pages.admin.exit-approval-outright');
    }

    public function view()
    {
        return view('pages.shop-ka.product-view');
    }
}
