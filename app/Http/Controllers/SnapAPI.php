<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SnapAPI extends Controller
{
    public function index()
    {
        return view('pages.snap-n-pay.index');
    }


    public function callback()
    {
        $response = request()->all(['status', 'orderNo', 'refNo', 'amount', 'fpxTxnId', 'extraData']);
        // Log::info($response);
        dd($response);
    }

    public function snapBuy()
    {
        $response = request()->all(['status', 'orderNo', 'refNo', 'amount', 'fpxTxnId', 'extraData']);
        // Log::info($response);
        dd($response);
    }
}
