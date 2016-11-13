<?php

use Zman\Zman;
use Zman\Helpers\Hebcal;
use Zman\Exceptions\InvalidDateException;

/**
 * Convert a Jewish date to a secular date.
 *
 * @param  string|int $month
 * @param  string|int $day
 * @param  string|int $year
 * @return Zman\Zman
 */
function toSecular($month, $day, $year)
{
    if ($month === 6 && !isLeapYear($year)) {
        throw new InvalidDateException("{$year} is not a leap year.");
    }

    return Zman::parse(jdtogregorian(jewishtojd($month, $day, $year)));
}

/**
 * Convert a secular date to a Jewish date.
 *
 * @param  string|int $month
 * @param  string|int $day
 * @param  string|int $year
 * @return array
 */
function toJewish($month, $day, $year)
{
    return jdtojewish(gregoriantojd($month, $day, $year));
}

/**
 * Checks if a Jewish year is meubar.
 *
 * @param  string|int $year
 * @return bool
 */
function isLeapYear($year)
{
    return (1 + ($year * 7)) % 19 < 7 ? true : false;
}

/**
 * Convert a number to Hebrew.
 *
 * @param  string|int $number
 * @return string
 */
function toHebrewNumber($number)
{
    return Hebcal::numberToHebrew($number);
}

/**
 * Convert a numerical Jewish year to Hebrew.
 *
 * @param  string|int $year
 * @return string
 */
function toHebrewYear($year)
{
    return Hebcal::numberToHebrew($year % 1000);
}
