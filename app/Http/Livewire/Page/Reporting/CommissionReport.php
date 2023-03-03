<?php

namespace App\Http\Livewire\Page\Reporting;

use App\Models\User;
use Livewire\Component;
use Rap2hpoutre\FastExcel\FastExcel;
use OpenSpout\Common\Entity\Style\Style;
use OpenSpout\Common\Entity\Style\CellAlignment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class CommissionReport extends Component
{
    public $report_date, $agent;
    public $parameters;
    public $report = 'commission-report';

    public function mount()
    {
        $this->report_date = now()->format('Y-m');
        $this->agent = $this->agent;
    }

    public function renderReportList()
    {
        $date = Carbon::createFromFormat('Y-m-d',$this->report_date. '-01');

        $result = DB::select(
                    "select user_id, CAST(YEAR(created_at) AS VARCHAR(4)) + '-' + CAST(MONTH(created_at) AS VARCHAR(2)) AS date, SUM(commission) AS commission, status
                    FROM commission_detail_kaps
                    where user_id = '".$this->agent."'
                        and CAST (created_at as date) >= '". $date->startOfMonth()->toDateString() . "' and CAST (created_at as date) <= '". $date->endOfMonth()->toDateString() ."'
                    GROUP BY CAST(YEAR(created_at) AS VARCHAR(4)) + '-' + CAST(MONTH(created_at) AS VARCHAR(2)),
                        user_id,status
                    order by CAST(YEAR(created_at) AS VARCHAR(4)) + '-' + CAST(MONTH(created_at) AS VARCHAR(2))");

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
                    'Date'                      => $item->date,
                    'Total Commission (RM)'     => $item->commission,
                    'Payment Status'            => $item->status,

                ];
            });
        }, sprintf(''.$this->report.'-%s.xlsx',$this->report_date));
    }

    public function render()
    {
        $this->parameters = "report=" . $this->report ."&report_date=".$this->report_date."&agent=".$this->agent;

        return view('livewire.page.reporting.commission-report', [
            'agents' => User::whereRole(3)->get(),
        ])->extends('default.default');
    }
}
