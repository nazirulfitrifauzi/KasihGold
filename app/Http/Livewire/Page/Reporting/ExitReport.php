<?php

namespace App\Http\Livewire\Page\Reporting;

use Livewire\Component;
use Rap2hpoutre\FastExcel\FastExcel;
use OpenSpout\Common\Entity\Style\Style;
use OpenSpout\Common\Entity\Style\CellAlignment;
use App\Models\BuyBack;
use App\Models\OutrightSell;
use App\Models\PhysicalConvert;

class ExitReport extends Component
{
    public $status,$report_date;
    public $parameters;
    public $report = 'exit-report';


    public function mount()
    {
        $this->status = $this->status;
        $this->report_date = now()->format('Y-m-d');
    }

    public function renderReportList()
    {
        $status = $this->status;

        if ($status == 'convert') {
            $result = PhysicalConvert::where('status',1)->get();
        } elseif ($status == 'outright') {
            $result = OutrightSell::where('status', 1)->get();
        } elseif ($status == 'buyback') {
            $result = BuyBack::where('status', 1)->get();
        } else {
            $result = PhysicalConvert::where('status', 1)->get();
        }

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
                    'Name'        => $item->user->name,
                    '1 gram'      => $item->one_gram.' unit',
                    '0.5 gram'    => $item->quarter_gram.' unit',
                    '0.25 gram'   => $item->decigram.' unit',
                    '0.01 gram'   => $item->centigram.' unit',
                    'Exit Date'   => $item->created_at->format('d/m/Y, h:i a'),
                ];
            });
        }, sprintf(''.$this->report.'-%s.xlsx',$this->report_date));
    }

    public function render()
    {
        $this->parameters = "report=" . $this->report ."&status=".$this->status;
        return view('livewire.page.reporting.exit-report')->extends('default.default');
    }
}
