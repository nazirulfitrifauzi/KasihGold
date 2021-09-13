<?php

namespace App\Http\Controllers;

use App\Models\BuyBack;
use App\Models\GoldbarOwnership;
use App\Models\Goldbar;
use App\Models\OutrightSell;
use App\Models\PhysicalConvert;
use App\Models\User;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ReportingController extends Controller
{
    public function summaryGoldbar(Request $request)
    {
        $date = Carbon::createFromFormat('Y-m-d', $request->report_date. '-01');
        $data = GoldbarOwnership::select('goldbar.serial_id', 'gold_ownership.weight', DB::raw('count(*) as total'))
                                    ->leftJoin('goldbar', 'goldbar.id', 'gold_ownership.gold_id')
                                    ->where('gold_ownership.gold_id', $request->serial)
                                    ->where('gold_ownership.created_at', '>=', $date->startOfMonth()->toDateString())
                                    ->where('gold_ownership.created_at', '<=', $date->endOfMonth()->toDateString())
                                    ->groupBy('gold_ownership.weight', 'goldbar.serial_id');

        return Datatables::of($data)->make(true);
    }

    public function summaryAgent(Request $request)
    {
        $agent = $request->agent;
        $date = Carbon::createFromFormat('Y-m-d', $request->report_date . '-01');
        $data = User::select('inv_items.name as denomination', DB::raw('count(commission_detail_kaps.commission) as unit_sell'), DB::raw('sum(commission_detail_kaps.commission) as total'))
                ->join('commission_detail_kaps', 'commission_detail_kaps.user_id', 'users.id')
                ->join('inv_items', 'inv_items.id', 'commission_detail_kaps.item_id')
                ->where('users.role',3)
                ->where('users.id', $agent)
                ->where('commission_detail_kaps.created_at', '>=', $date->startOfMonth()->toDateString())
                ->where('commission_detail_kaps.created_at', '<=', $date->endOfMonth()->toDateString())
                ->groupBy('inv_items.name');
        return Datatables::of($data)
            ->make(true);
    }

    public function summaryCommission(Request $request)
    {
        $agent = $request->agent;
        $date = Carbon::createFromFormat('Y-m-d', $request->report_date . '-01');

        $data = DB::select("select user_id, CAST(YEAR(created_at) AS VARCHAR(4)) + '-' + CAST(MONTH(created_at) AS VARCHAR(2)) AS date, SUM(commission) AS commission, status
                            FROM commission_detail_kaps
                            where user_id = '".$agent."'
                                and CAST (created_at as date) >= '". $date->startOfMonth()->toDateString() . "' and CAST (created_at as date) <= '". $date->endOfMonth()->toDateString() ."'
                            GROUP BY CAST(YEAR(created_at) AS VARCHAR(4)) + '-' + CAST(MONTH(created_at) AS VARCHAR(2)),
                                user_id,status
                            order by CAST(YEAR(created_at) AS VARCHAR(4)) + '-' + CAST(MONTH(created_at) AS VARCHAR(2))");

        return Datatables::of($data)
            ->editColumn('date', function ($data) {
                $format_date = Carbon::createFromFormat('Y-m', $data->date);
                return $format_date->format('F Y');
            })
            ->make(true);
    }

    public function userBuyOrNot(Request $request)
    {
        $status = $request->status;

        if($status == 'buy') {
            $data = DB::select("select a.name, a.email, a.phone_no, (select name from users where id = c.agent_id) as agent
                                FROM users a
                                left join gold_ownership b on b.user_id = a.id
                                left join profile_personal c on c.user_id = a.id
                                where b.user_id IS NULL
                                and a.role != 1
                                and a.role != 3
                                group by a.id, a.name, a.email, a.phone_no, c.agent_id
                                order by a.id;");
        } else {
            $data = DB::select("select a.name, a.email, a.phone_no, (select name from users where id = c.agent_id) as agent
                                FROM users a
                                left join gold_ownership b on b.user_id = a.id
                                left join profile_personal c on c.user_id = a.id
                                where b.user_id IS NOT NULL
                                and a.role != 1
                                and a.role != 3
                                group by a.id, a.name, a.email, a.phone_no, c.agent_id
                                order by a.id;");
        }

        return Datatables::of($data)
            ->make(true);
    }

    public function exitReporting(Request $request)
    {
        $status = $request->exit;

        if ($status == 'convert') {
            $data = PhysicalConvert::where('status',1)->get();
        } elseif ($status == 'outright') {
            $data = OutrightSell::where('status', 1)->get();
        } elseif ($status == 'buyback') {
            $data = BuyBack::where('status', 1)->get();
        } else {
            $data = PhysicalConvert::where('status', 1)->get();
        }

        return Datatables::of($data)
                    ->editColumn('user_id', function ($data) {
                        return $data->user->name;
                    })
                    ->editColumn('created_at', function ($data) {
                        return $data->created_at->format('d/m/Y, h:i a');
                    })
                    ->make(true);
    }
}
