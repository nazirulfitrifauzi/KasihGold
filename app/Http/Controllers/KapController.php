<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KapController extends Controller
{
    public function pendingApproval()
    {
        return view('pages.kap.pending-approval-kap');
    }

    public function pendingApprovalAgent()
    {
        return view('pages.kap.pending-approval-kap-agent');
    }

    public function myAgent()
    {
        return view('pages.kap.my-agent-kap');
    }
}
