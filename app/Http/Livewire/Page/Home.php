<?php

namespace App\Http\Livewire\Page;

use App\Models\Goldbar;
use App\Models\GoldbarOwnership;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Home extends Component
{
    public $pendingApproval;
    public $myAgent;
    public $activeUser;
    public $userGold;
    public $tGold, $goldInfo;
    public $chart1, $mainchart1, $chart2, $mainchart2;
    public $subchart1day, $subchart1month, $subchart2day, $subchart2month, $subchart3day, $subchart3month, $subchart4day, $subchart4month;

    public function mount()
    {
        // admin KAP
        if (auth()->user()->isAdminKAP()) {

            $this->pendingApproval = User::where('client', 2)->where('role', 3)->where('active', 0)->get();
            $this->myAgent = User::where('client', 2)->where('role', 3)->where('active', 1)->get();
            $this->chart1 = GoldbarOwnership::get();
            $this->mainchart1 = DB::table('gold_ownership')
                                ->select(DB::raw('top 10 CAST(created_at AS DATE) as x'), DB::raw('SUM(bought_price) as y'))
                                ->groupBy(DB::raw("CAST(created_at AS DATE)"))
                                ->orderBy(DB::raw("CAST(created_at AS DATE)"), 'desc')
                                ->get()
                                ->toArray();
            $this->chart2 = Goldbar::get();
            $this->mainchart2 = DB::table('goldbar')
                                ->select(DB::raw('top 10 CAST(created_at AS DATE) as x'), DB::raw('SUM(bought_price) as y'))
                                ->groupBy(DB::raw("CAST(created_at AS DATE)"))
                                ->orderBy(DB::raw("CAST(created_at AS DATE)"), 'desc')
                                ->get()
                                ->toArray();

            $this->subchart1day = DB::table('gold_ownership')
                                ->select(DB::raw('top 10 CAST(created_at AS DATE) as x'), DB::raw('SUM(bought_price) as y'))
                                ->where('weight',0.01)
                                ->groupBy(DB::raw("CAST(created_at AS DATE)"))
                                ->orderBy(DB::raw("CAST(created_at AS DATE)"), 'desc')
                                ->get()
                                ->toArray();
            $this->subchart1month = DB::table('gold_ownership')
                                    ->select(DB::raw("top 12 DATENAME(month, DATEADD(month, CAST(MONTH(created_at) AS VARCHAR(2))-1, CAST('2008-01-01' AS datetime))) + ' ' + CAST(YEAR(created_at) AS VARCHAR(4)) AS x"), DB::raw('SUM(bought_price) as y'))
                                    ->where('weight',0.01)
                                    ->groupBy(DB::raw("DATENAME(month, DATEADD(month, CAST(MONTH(created_at) AS VARCHAR(2))-1, CAST('2008-01-01' AS datetime))) + ' ' + CAST(YEAR(created_at) AS VARCHAR(4))"))
                                    ->orderBy(DB::raw("DATENAME(month, DATEADD(month, CAST(MONTH(created_at) AS VARCHAR(2))-1, CAST('2008-01-01' AS datetime))) + ' ' + CAST(YEAR(created_at) AS VARCHAR(4))"), 'desc')
                                    ->get()
                                    ->toArray();

            $this->subchart2day = DB::table('gold_ownership')
                                ->select(DB::raw('top 10 CAST(created_at AS DATE) as x'), DB::raw('SUM(bought_price) as y'))
                                ->where('weight',0.1)
                                ->groupBy(DB::raw("CAST(created_at AS DATE)"))
                                ->orderBy(DB::raw("CAST(created_at AS DATE)"), 'desc')
                                ->get()
                                ->toArray();
            $this->subchart2month = DB::table('gold_ownership')
                                    ->select(DB::raw("top 12 DATENAME(month, DATEADD(month, CAST(MONTH(created_at) AS VARCHAR(2))-1, CAST('2008-01-01' AS datetime))) + ' ' + CAST(YEAR(created_at) AS VARCHAR(4)) AS x"), DB::raw('SUM(bought_price) as y'))
                                    ->where('weight', 0.1)
                                    ->groupBy(DB::raw("DATENAME(month, DATEADD(month, CAST(MONTH(created_at) AS VARCHAR(2))-1, CAST('2008-01-01' AS datetime))) + ' ' + CAST(YEAR(created_at) AS VARCHAR(4))"))
                                    ->orderBy(DB::raw("DATENAME(month, DATEADD(month, CAST(MONTH(created_at) AS VARCHAR(2))-1, CAST('2008-01-01' AS datetime))) + ' ' + CAST(YEAR(created_at) AS VARCHAR(4))"), 'desc')
                                    ->get()
                                    ->toArray();

            $this->subchart3day = DB::table('gold_ownership')
                                ->select(DB::raw('top 10 CAST(created_at AS DATE) as x'), DB::raw('SUM(bought_price) as y'))
                                ->where('weight',0.25)
                                ->groupBy(DB::raw("CAST(created_at AS DATE)"))
                                ->orderBy(DB::raw("CAST(created_at AS DATE)"), 'desc')
                                ->get()
                                ->toArray();
            $this->subchart3month = DB::table('gold_ownership')
                                    ->select(DB::raw("top 12 DATENAME(month, DATEADD(month, CAST(MONTH(created_at) AS VARCHAR(2))-1, CAST('2008-01-01' AS datetime))) + ' ' + CAST(YEAR(created_at) AS VARCHAR(4)) AS x"), DB::raw('SUM(bought_price) as y'))
                                    ->where('weight', 0.25)
                                    ->groupBy(DB::raw("DATENAME(month, DATEADD(month, CAST(MONTH(created_at) AS VARCHAR(2))-1, CAST('2008-01-01' AS datetime))) + ' ' + CAST(YEAR(created_at) AS VARCHAR(4))"))
                                    ->orderBy(DB::raw("DATENAME(month, DATEADD(month, CAST(MONTH(created_at) AS VARCHAR(2))-1, CAST('2008-01-01' AS datetime))) + ' ' + CAST(YEAR(created_at) AS VARCHAR(4))"), 'desc')
                                    ->get()
                                    ->toArray();

            $this->subchart4day = DB::table('gold_ownership')
                                ->select(DB::raw('top 10 CAST(created_at AS DATE) as x'), DB::raw('SUM(bought_price) as y'))
                                ->where('weight',1)
                                ->groupBy(DB::raw("CAST(created_at AS DATE)"))
                                ->orderBy(DB::raw("CAST(created_at AS DATE)"), 'desc')
                                ->get()
                                ->toArray();
            $this->subchart4month = DB::table('gold_ownership')
                                    ->select(DB::raw("top 12 DATENAME(month, DATEADD(month, CAST(MONTH(created_at) AS VARCHAR(2))-1, CAST('2008-01-01' AS datetime))) + ' ' + CAST(YEAR(created_at) AS VARCHAR(4)) AS x"), DB::raw('SUM(bought_price) as y'))
                                    ->where('weight', 1)
                                    ->groupBy(DB::raw("DATENAME(month, DATEADD(month, CAST(MONTH(created_at) AS VARCHAR(2))-1, CAST('2008-01-01' AS datetime))) + ' ' + CAST(YEAR(created_at) AS VARCHAR(4))"))
                                    ->orderBy(DB::raw("DATENAME(month, DATEADD(month, CAST(MONTH(created_at) AS VARCHAR(2))-1, CAST('2008-01-01' AS datetime))) + ' ' + CAST(YEAR(created_at) AS VARCHAR(4))"), 'desc')
                                    ->get()
                                    ->toArray();

        } elseif (auth()->user()->isAgentKAP()) {

            $logged_user = auth()->user()->id;
            $this->pendingApproval = User::whereHas('profile', function ($query) use ($logged_user) {
                $query->where('agent_id', '=', $logged_user);
            })->whereClient(2)->whereRole(4)->whereActive(0)->get();

            $this->activeUser = User::where('client', 2)->where('role', 4)->where('active', 1)->get();

        }



        $goldInfo = GoldbarOwnership::where('user_id', auth()->user()->id)->where('active_ownership', 1)->get();
        $this->tGold = 0;

        foreach ($goldInfo as $golds) {
            $this->tGold += $golds->weight;
        }
    }

    public function render()
    {
        return view('livewire.page.home');
    }
}
