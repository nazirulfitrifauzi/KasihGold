<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerOrderController extends Controller
{
    public function index()
    {
        return view('pages.customerorder.customer-order');
    }
}
