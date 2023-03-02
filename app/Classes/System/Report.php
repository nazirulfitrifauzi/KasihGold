<?php
namespace App\Classes\System;

class Report
{
    public static function classMapper($name)
    {
        $namespace = "App\\Classes\\Report\\";
        return $namespace . str_replace(' ', '', ucwords(str_replace('-', ' ', $name)));
    }

    public static function getFields($row)
    {
        $fields = [];
        if($row) {
            foreach($row as $field => $value) {
                $fields[] = $field;
            }
        }

        return $fields;
    }
}
