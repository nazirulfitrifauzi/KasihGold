<?php

namespace App\Http\Livewire\Page\Reporting;

use App\Models\Goldbar;
use Livewire\Component;
use App\Models\GoldbarOwnership;
use Rap2hpoutre\FastExcel\FastExcel;
use OpenSpout\Common\Entity\Style\Style;
use OpenSpout\Common\Entity\Style\CellAlignment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class GoldReport extends Component
{
    public $report_date, $serial;
    public $parameters;
    public $report = 'gold-report';


    public function mount()
    {
        $this->report_date = now()->format('Y-m');
        $this->serial = $this->serial;
    }

    public function renderReportList()
    {
        $date = Carbon::createFromFormat('Y-m-d', $this->report_date. '-01');
        $result = GoldbarOwnership::select('goldbar.serial_id', 'gold_ownership.weight', DB::raw('count(*) as total'))
                                    ->leftJoin('goldbar', 'goldbar.id', 'gold_ownership.gold_id')
                                    ->where('gold_ownership.gold_id', $this->serial)
                                    ->where('gold_ownership.created_at', '>=', $date->startOfMonth()->toDateString())
                                    ->where('gold_ownership.created_at', '<=', $date->endOfMonth()->toDateString())
                                    ->groupBy('gold_ownership.weight', 'goldbar.serial_id')
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
                    'Serial Id' => $item->serial_id,
                    'Weight'    => $item->weight,
                    'Total'     => number_format($item->total, 2),

                ];
            });
        }, sprintf(''.$this->report.'-%s.xlsx',$this->report_date));
    }


    public function render()
    {
        $this->parameters = "report=" . $this->report ."&report_date=".$this->report_date."&serial=".$this->serial;

        return view('livewire.page.reporting.gold-report', [
            'goldbar' => Goldbar::get(),
        ])->extends('default.default');
    }
}
