<?php

namespace App\Http\Controllers;

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
}
