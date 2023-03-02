<?php

namespace App\Classes\Report;

use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class UserReport
{
    public static $template = 'pdf.report.user-report';
    public static $orientation = 'landscape';

    public static function getData($parameters)
    {

        $status = $report_date = $parameters['status'];

        if($status == 'buy') {
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

        ini_set("memory_limit", "8G");

        return [
            'data' => $result,
        ];
    }
}
