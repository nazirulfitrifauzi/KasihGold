<?php

namespace App\Classes\Report;

use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class AgentsReport
{
    public static $template = 'pdf.report.agents-report';
    public static $orientation = 'portrait';

    public static function getData($parameters)
    {
        $report_date = $parameters['report_date'];
        $agent =  $parameters['agent'];

        $date = Carbon::createFromFormat('Y-m-d', $report_date . '-01');
        $result = User::select('inv_items.name as denomination', DB::raw('count(commission_detail_kaps.commission) as unit_sell'), DB::raw('sum(commission_detail_kaps.commission) as total'))
                ->join('commission_detail_kaps', 'commission_detail_kaps.user_id', 'users.id')
                ->join('inv_items', 'inv_items.id', 'commission_detail_kaps.item_id')
                ->where('users.role',3)
                ->where('users.id', $agent)
                ->where('commission_detail_kaps.created_at', '>=', $date->startOfMonth()->toDateString())
                ->where('commission_detail_kaps.created_at', '<=', $date->endOfMonth()->toDateString())
                ->groupBy('inv_items.name')
                ->get();
        return [
            'data' => $result,
        ];
    }
}
