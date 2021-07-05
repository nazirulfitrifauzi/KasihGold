<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\PhysicalConvert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ToyyibpayController extends Controller
{


    public function paymentStatus()
    {
        $response = request()->all(['status_id', 'billcode', 'order_id']);

        $gold = PhysicalConvert::where('user_id', auth()->user()->id)
            ->where('ref_payment', $response['billcode'])
            ->where('status', 2)
            ->first();

        if ($gold) {
            $gold->update(array(
                'status' => 1,
            ));


            session()->flash('message', 'Your Physical Gold Conversion Request Has Successfully Submitted.');

            session()->flash('success');
            session()->flash('title', 'Success!');
        }
        return redirect('home');
        // return $response;
    }

    public function callback()
    {
        $response = request()->all(['refno', 'status', 'reason', 'billcode', 'order_id', 'amount']);
        Log::info($response);
    }
}
