<?php

use Carbon\Carbon;
use Zmanim\Exceptions\InvalidDateException;

/**
 * Convert a Jewish date to a secular date.
 *
 * @param  string|int $month
 * @param  string|int $day
 * @param  string|int $year
 * @return Carbon\Carbon
 */
function toSecular($month, $day, $year)
{
    if ($month === 6 && !isLeapYear($year)) {
        throw new InvalidDateException("{$year} is not a leap year. Use '7' for Adar instead.");
    }

    return Carbon::parse(jdtogregorian(jewishtojd($month, $day, $year)));
}

/**
 * Convert a secular date to a jewish date.
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
 * Checks if a jewish year is meubar.
 *
 * @param  string|int $year
 * @return bool
 */
function isLeapYear($year)
{
    return (1 + ($year * 7)) % 19 < 7 ? true : false;
}
