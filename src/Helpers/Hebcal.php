<?php

namespace Zmanim\Helpers;

class Hebcal
{
    const ALEPH_BEIS = [
        1   => "\327\220",
        2   => "\327\221",
        3   => "\327\222",
        4   => "\327\223",
        5   => "\327\224",
        6   => "\327\225",
        7   => "\327\226",
        8   => "\327\227",
        9   => "\327\230",
        10  => "\327\231",
        20  => "\327\233",
        30  => "\327\234",
        40  => "\327\236",
        50  => "\327\240",
        60  => "\327\241",
        70  => "\327\242",
        80  => "\327\244",
        90  => "\327\246",
        100 => "\327\247",
        200 => "\327\250",
        300 => "\327\251",
        400 => "\327\252",
    ];

    /**
     * Split a number into an array of parts which
     * corresponds with Hebrew gematria values.
     *
     * @param  string|int $number
     * @return array
     */
    private static function numberToArray($number)
    {
        $result = [];
        while ($number > 0) {
            $incr = 100;
            if ($number == 15 || $number == 16) {
                $result[] = 9;
                $result[] = $number - 9;
                break;
            }
            for ($i = 400; $i > $number; $i -= $incr) {
                if ($i == $incr) {
                    $incr = (int) ($incr / 10);
                }
            }
            $result[] = $i;
            $number -= $i;
        }
        return $result;
    }

    /**
     * Convert a number to Hebrew.
     *
     * @param  string|int $number
     * @return string
     */
    public static function numberToHebrew($number)
    {
        $arr = static::numberToArray($number);
        $digits = count($arr);
        if ($digits == 1) {
            $result = static::ALEPH_BEIS[$arr[0]]."\327\263"; // geresh
        } else {
            $result = '';
            for ($i = 0; $i < $digits; $i++) {
                if (($i + 1) == $digits) {
                    $result .= "\327\264"; // gershayim
                }
                $result .= static::ALEPH_BEIS[$arr[$i]];
            }
        }
        return $result;
    }
}
