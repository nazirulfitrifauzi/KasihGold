<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function setting()
    {
        return view('pages.setting');
    }

    public function settingKAP()
    {
        return view('pages.setting-kap');
    }
}
