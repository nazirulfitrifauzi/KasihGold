<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BankInformationController extends Controller
{
    public function index()
    {
        return view ('pages.bank.bank-information');
    }
}
