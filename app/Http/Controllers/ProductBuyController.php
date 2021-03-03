<?php

namespace App\Http\Controllers;

use App\Models\InvMaster;
use Illuminate\Http\Request;

class ProductBuyController extends Controller
{
    public function index($id)
    {
        $selected_product = InvMaster::where('item_id', 17)->get();
        return view('pages.shop.product-buy', compact('selected_product'));
    }
}
