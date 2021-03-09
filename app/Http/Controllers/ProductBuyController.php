<?php

namespace App\Http\Controllers;

use App\Models\InvMaster;
use Illuminate\Support\Facades\View;

class ProductBuyController extends Controller
{
    public function index()
    {
        return view('pages.shop.product-buy');
    }
}
