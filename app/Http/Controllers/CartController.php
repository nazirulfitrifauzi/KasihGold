<?php

namespace App\Http\Controllers;

use App\Models\InvCart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        return view ('pages.cart.cart');
    }

    public function destroy($id)
    {
        InvCart::whereId($id)->delete();

        return response()->json([
            'success' => true
        ]);
        // return back();
    }
}
