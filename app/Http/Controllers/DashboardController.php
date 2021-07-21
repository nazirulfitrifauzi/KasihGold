<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('pages.home');
    }

    public function pendingApproval()
    {
        return view('pages.kap.pending-approval-kap');
    }

    public function pendingApprovalAgent()
    {
        return view('pages.kap.pending-approval-kap-agent');
    }

    public function withdrawalRequest()
    {
        return view('pages.kap.withdrawal-request');
    }

    public function cashback()
    {
        return view('pages.kap.cashback');
    }

    public function todaysTransaction()
    {
        return view('pages.kap.todays-transaction');
    }

    public function delete($id)
    {
        User::whereId($id)->delete();

        return response()->json([
            'success' => true
        ]);
    }
}
