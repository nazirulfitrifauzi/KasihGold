<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IncidentReportingController extends Controller
{
    public function index()
    {
        return view('pages.incedentReport.incident_reporting');
    }

    public function admin()
    {
        return view('pages.admin.incident_reporting');
    }
}
