<?php

namespace App\Http\Livewire\Page\Reporting;

use Livewire\Component;
use Rap2hpoutre\FastExcel\FastExcel;
use OpenSpout\Common\Entity\Style\Style;
use OpenSpout\Common\Entity\Style\CellAlignment;
use Illuminate\Support\Facades\DB;

class UserReport extends Component
{
    public $status,$report_date;
    public $parameters;
    public $report = 'user-report';


    public function mount()
    {
        $this->status = $this->status;
        $this->report_date = now()->format('Y-m-d');
    }


    public function renderReportList()
    {
        if($this->status == 'buy') {
            $result = DB::select("select a.name, a.email, a.phone_no, (select name from users where id = c.agent_id) as agent
                                FROM users a
                                left join gold_ownership b on b.user_id = a.id
                                left join profile_personal c on c.user_id = a.id
                                where b.user_id IS NULL
                                and a.role != 1
                                and a.role != 3
                                group by a.id, a.name, a.email, a.phone_no, c.agent_id
                                order by a.id;");
        } else {
            $result = DB::select("select a.name, a.email, a.phone_no, (select name from users where id = c.agent_id) as agent
                                FROM users a
                                left join gold_ownership b on b.user_id = a.id
                                left join profile_personal c on c.user_id = a.id
                                where b.user_id IS NOT NULL
                                and a.role != 1
                                and a.role != 3
                                group by a.id, a.name, a.email, a.phone_no, c.agent_id
                                order by a.id;");
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
                    'Name'     => $item->name,
                    'Email'    => $item->email,
                    'Phone No' => $item->phone_no,
                    'Agent'    => $item->agent,
                ];
            });
        }, sprintf(''.$this->report.'-%s.xlsx',$this->report_date));
    }

    public function render()
    {
        $this->parameters = "report=" . $this->report ."&status=".$this->status;
        return view('livewire.page.reporting.user-report')->extends('default.default');
    }
}
