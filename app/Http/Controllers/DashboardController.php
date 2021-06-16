<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        if (auth()->user()->role == '2') {
            return view('pages.dashboard-hq-kasih-ap');
        }
        if (auth()->user()->role == '4') {
            return view('pages.dashboard-agent-kasih-ap');
        }
        if (auth()->user()->role == '6') {
            return view('pages.dashboard-kasih-ap');
        } else
            return view('pages.dashboard');
    }

    public function dashboardKasihAp()
    {
        return view('pages.dashboard-kasih-ap');
    }

    public function dashboardAgentKasihAp()
    {
        return view('pages.dashboard-agent-kasih-ap');
    }

    public function dashboardHqKasihAp()
    {
        return view('pages.dashboard-hq-kasih-ap');
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
