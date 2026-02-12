<?php

use Zman\Zman;
use Zman\Helpers\Hebcal;
use Zman\Exceptions\InvalidDateException;

require_once 'holidays.php';
require_once 'parshios.php';

if (!function_exists('toSecular')) {
    /**
     * Convert a Jewish date to a secular date.
     */
    function toSecular(int $month, int $day, int $year): Zman
    {
        if ($month === 6 && !isJewishLeapYear($year)) {
            throw new InvalidDateException("{$year} is not a leap year.");
        }

        return Zman::createFromFormat('m/d/Y', jdtogregorian(jewishtojd($month, $day, $year)))->startOfDay();
    }
}

if (!function_exists('toJewish')) {
    /**
     * Convert a secular date to a Jewish date.
     */
    function toJewish(int $month, int $day, int $year): string
    {
        return jdtojewish(gregoriantojd($month, $day, $year));
    }
}

if (!function_exists('isJewishLeapYear')) {
    /**
     * Checks if a Jewish year is meubar.
     */
    function isJewishLeapYear(int $year): bool
    {
        return (1 + ($year * 7)) % 19 < 7;
    }
}

if (!function_exists('toHebrewNumber')) {
    /**
     * Convert a number to Hebrew.
     */
    function toHebrewNumber(int $number): string
    {
        return Hebcal::numberToHebrew($number);
    }
}
