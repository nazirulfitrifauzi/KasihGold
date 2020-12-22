<?php

namespace App\Http\Controllers;

use App\Models\States;
use Illuminate\Http\Request;

class SuppliersController extends Controller
{
    public function index()
    {
        return view('pages.admin.suppliers');
    }
}
