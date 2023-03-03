<?php

namespace App\Http\Livewire\Page\Reporting;

use App\Models\User;
use Livewire\Component;
use Rap2hpoutre\FastExcel\FastExcel;
use OpenSpout\Common\Entity\Style\Style;
use OpenSpout\Common\Entity\Style\CellAlignment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class AgentReport extends Component
{
    public $report_date, $agent;
    public $parameters;
    public $report = 'agents-report';

    public function mount()
    {
        $this->report_date = now()->format('Y-m');
        $this->agent = $this->agent;
    }

    public function renderReportList()
    {
        $date = Carbon::createFromFormat('Y-m-d', $this->report_date . '-01');
        $result = User::select('inv_items.name as denomination',
                DB::raw('count(commission_detail_kaps.commission) as unit_sell'),
                DB::raw('sum(commission_detail_kaps.commission) as total'))
                ->join('commission_detail_kaps', 'commission_detail_kaps.user_id', 'users.id')
                ->join('inv_items', 'inv_items.id', 'commission_detail_kaps.item_id')
                ->where('users.role',3)
                ->where('users.id',  $this->agent)
                ->where('commission_detail_kaps.created_at', '>=', $date->startOfMonth()->toDateString())
                ->where('commission_detail_kaps.created_at', '<=', $date->endOfMonth()->toDateString())
                ->groupBy('inv_items.name')
                ->get();

        foreach ( $result as $item) {
            yield $item;
        }
    }

    public function generateExcel()
    {
        return response()->streamDownload(function () {
            $header_style = (new Style())
                ->setFontBold()
                ->setShouldWrapText(false);
            $rows_style = (new Style())
                ->setShouldWrapText(false);
            return (new FastExcel($this->renderReportList()))
                ->headerStyle($header_style)
                ->rowsStyle($rows_style)
                ->export('php://output' , function ($item) {
                return [
                    'Denomination'      => $item->denomination,
                    'No. of Unit Sell'  => $item->unit_sell,
                    'Commision (RM)'    => number_format($item->total, 2),

                ];
            });
        }, sprintf(''.$this->report.'-%s.xlsx',$this->report_date));
    }


    public function render()
    {
        $this->parameters = "report=" . $this->report ."&report_date=".$this->report_date."&agent=".$this->agent;
        return view('livewire.page.reporting.agent-report',[
            'agents' => User::whereRole(3)->get(),
        ])->extends('default.default');
    }
}
