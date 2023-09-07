<?php

function DateForHuman($std_date, $with_time = false)
{
    return $with_time ? date('d/m/Y h:i:s A', strtotime($std_date)) : date('d/m/Y', strtotime($std_date));
}

function DateFormatted($std_date, $with_time = false)
{
    return $with_time ? date('Y-m-d h:i:s A', strtotime($std_date)) : date('Y-m-d', strtotime($std_date));
}

function Money($value, $thousand_separator = true)
{
    $value = ($value != "" and $value) ? $value : 0;

    if (is_numeric($value)) {
        $value = ($value and $value != "") ? MoneyToFloat($value) : 0;
        return ($thousand_separator) ? number_format($value, 2) : number_format($value, 2, '.', '');
    }
    return $value;
}

//weight format according to marhun decimal point
// function Marhun($value, $marhun, $thousand_separator = true)
// {
//     $marhun_code = Ref_MarhunType::select('DECIMAL_POINT')->where('MARHUN_CODE', $marhun)->first();
//     $value = ($value != "" and $value) ? $value : 0;

//     if (is_numeric($value)) {
//         $value = ($value and $value != "") ? MoneyToFloat($value) : 0;
//         return ($thousand_separator) ? number_format($value, $marhun_code->DECIMAL_POINT) : number_format($value, $marhun_code->DECIMAL_POINT, '.', '');
//     }
//     return $value;
// }

function BskeMoney($value, $thousand_separator = true)
{
    $value = ($value != "" and $value) ? $value : 0;

    if (is_numeric($value)) {
        $value = ($value and $value != "") ? MoneyToFloat($value) : 0;
        return ($thousand_separator) ? number_format($value, 5) : number_format($value, 2, '.', '');
    }
    return $value;
}

function MoneyRound($value)
{
    $value_format = number_format($value, 2, '.', '');
    $saperate_value = explode('.', $value_format);

    $amount = $saperate_value[0];
    $cent = $saperate_value[1];

    $adjusted_cent = "";
    if (in_array($cent[1], ['1', '2'])) $adjusted_cent = $cent[0] . "0";
    elseif (in_array($cent[1], ['3', '4', '5', '6', '7'])) $adjusted_cent = $cent[0] . "5";
    elseif (in_array($cent[1], ['8', '9'])) $adjusted_cent = $cent[0] + 1 . "0";
    else $adjusted_cent = $cent;

    if ($adjusted_cent == 100) {
        $adjusted_cent = "00";
        $amount += 1;
    }
    return (int)$amount . "." . $adjusted_cent;
}

function MoneyToFloat($value)
{
    return str_replace(',', '', $value);
}
