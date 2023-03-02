<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use App\Classes\System\Report;
use Illuminate\Http\Request;

class Reporting extends Controller
{
    public function index(Request $request)
    {
        if(count($request->all()) > 0) {
            $class = Report::classMapper($request->input('report'));
            $template = $class::$template;
            $data = $class::getData($request->all());
            $orientation = $class::$orientation;

            $html = view($template, compact('data'))->render();

            $pdf = App::make('dompdf.wrapper')->setPaper('a4', $orientation);
            $pdf->loadHTML($html);
            return $pdf->stream();
        }
    }
}
