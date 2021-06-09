<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view ('pages.dashboard');
    }

    public function dashboardUser()
    {
        return view ('pages.dashboard-user');
    }

    public function dashboardKasihAp()
    {
        return view ('pages.dashboard-kasih-ap');
    }

    public function dashboardHqKasihAp()
    {
        return view ('pages.dashboard-hq-kasih-ap');
    }
}
