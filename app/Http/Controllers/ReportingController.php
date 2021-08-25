<?php

namespace App\Http\Controllers;

use App\Models\GoldbarOwnership;
use App\Models\Goldbar;
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
}
