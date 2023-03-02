<?php

namespace App\Classes\Report;

use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\BuyBack;
use App\Models\OutrightSell;
use App\Models\PhysicalConvert;

class ExitReport
{
    public static $template = 'pdf.report.exit-report';
    public static $orientation = 'landscape';

    public static function getData($parameters)
    {
        $status = $report_date = $parameters['status'];

        if ($status == 'convert') {
            $result = PhysicalConvert::where('status',1)->get();
        } elseif ($status == 'outright') {
            $result = OutrightSell::where('status', 1)->get();
        } elseif ($status == 'buyback') {
            $result = BuyBack::where('status', 1)->get();
        } else {
            $result = PhysicalConvert::where('status', 1)->get();
        }





        return [
            'data' => $result,
        ];
    }
}
