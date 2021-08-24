<?php

namespace App\Http\Controllers;

use App\Models\GoldbarOwnership;
use App\Models\Goldbar;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ReportingController extends Controller
{
    public function index(){
        $goldbar = Goldbar::get();
        return view ('pages.reporting.reporting', compact('goldbar'));
    }

    public function summaryGoldbar(Request $request)
    {
        $date = Carbon::createFromFormat('Y-m-d', $request->report_date. '-01');
        $data = GoldbarOwnership::select('goldbar.serial_id', 'gold_ownership.weight', DB::raw('count(*) as total'))
                                    ->leftJoin('goldbar', 'goldbar.id', 'gold_ownership.gold_id')
                                    ->where('gold_ownership.gold_id', $request->serial)
                                    ->where('gold_ownership.created_at', '>=', $date->startOfMonth()->toDateString())
                                    ->where('gold_ownership.created_at', '<=', $date->endOfMonth()->toDateString())
                                    ->groupBy('gold_ownership.weight', 'goldbar.serial_id');
        return Datatables::of($data)
            ->make(true);
    }
}
