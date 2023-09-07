<?php

namespace App\Utilities;

class MoneyUtils
{
    /**
     * Format a value as money.
     *
     * @param float $value
     * @param bool $thousand_separator
     * @return string
     */
    public static function format($value, $thousand_separator = true)
    {
        $value = ($value !== "" && $value) ? self::toFloat($value) : 0;

        return ($thousand_separator)
            ? number_format($value, 2)
            : number_format($value, 2, '.', '');
    }

    /**
     * Round a value to nearest .05 or .00.
     *
     * @param float $value
     * @return string
     */
    public static function round($value)
    {
        $valueFormat = number_format($value, 2, '.', '');
        [$amount, $cent] = explode('.', $valueFormat);

        if (in_array($cent[1], ['1', '2'])) $cent = $cent[0] . "0";
        elseif (in_array($cent[1], ['3', '4', '5', '6', '7'])) $cent = $cent[0] . "5";
        elseif (in_array($cent[1], ['8', '9'])) $cent = ($cent[0] + 1) . "0";
        // No need for the else clause since $cent remains unchanged if it doesn't match the conditions above

        if ($cent == 100) {
            $cent = "00";
            $amount += 1;
        }
        return $amount . "." . $cent;
    }

    /**
     * Convert a formatted money value to a float.
     *
     * @param string $value
     * @return float
     */
    public static function toFloat($value)
    {
        return (float)str_replace(',', '', $value);
    }
}
