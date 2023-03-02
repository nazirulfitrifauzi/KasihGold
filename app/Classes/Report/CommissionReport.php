<?php

namespace App\Classes\Report;

use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class CommissionReport
{
    public static $template = 'pdf.report.commission-report';
    public static $orientation = 'portrait';

    public static function getData($parameters)
    {

        $report_date = $parameters['report_date'];
        $agent =  $parameters['agent'];

        $date = Carbon::createFromFormat('Y-m-d',   $report_date. '-01');

        $result = DB::select("select user_id, CAST(YEAR(created_at) AS VARCHAR(4)) + '-' + CAST(MONTH(created_at) AS VARCHAR(2)) AS date, SUM(commission) AS commission, status
                            FROM commission_detail_kaps
                            where user_id = '".$agent."'
                                and CAST (created_at as date) >= '". $date->startOfMonth()->toDateString() . "' and CAST (created_at as date) <= '". $date->endOfMonth()->toDateString() ."'
                            GROUP BY CAST(YEAR(created_at) AS VARCHAR(4)) + '-' + CAST(MONTH(created_at) AS VARCHAR(2)),
                                user_id,status
                            order by CAST(YEAR(created_at) AS VARCHAR(4)) + '-' + CAST(MONTH(created_at) AS VARCHAR(2))");


        return [
            'data' => $result,
        ];
    }
}
