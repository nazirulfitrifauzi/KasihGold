<?php

namespace App\Classes\Report;

use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\GoldbarOwnership;

class GoldReport
{
    public static $template = 'pdf.report.gold-report';
    public static $orientation = 'portrait';

    public static function getData($parameters)
    {
        $report_date = $parameters['report_date'];
        $serial =  $parameters['serial'];

        $date = Carbon::createFromFormat('Y-m-d', $report_date. '-01');
        $result = GoldbarOwnership::select('goldbar.serial_id', 'gold_ownership.weight', DB::raw('count(*) as total'))
                                    ->leftJoin('goldbar', 'goldbar.id', 'gold_ownership.gold_id')
                                    ->where('gold_ownership.gold_id', $serial)
                                    ->where('gold_ownership.created_at', '>=', $date->startOfMonth()->toDateString())
                                    ->where('gold_ownership.created_at', '<=', $date->endOfMonth()->toDateString())
                                    ->groupBy('gold_ownership.weight', 'goldbar.serial_id')
                                    ->get();
        return [
            'data' => $result,
        ];
    }
}
