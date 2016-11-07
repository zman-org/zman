<?php

namespace Zmanim\Moadim;

use Carbon\Carbon;

trait Holidays
{
    /**
     * Gets the first day of Pesach for a given Jewish year.
     *
     * @param  string|int $year
     * @return Carbon\Carbon
     */
    public static function firstDayOfPesach($year)
    {
        return toSecular(8, 15, $year);
    }

    /**
     * Gets the day of Pesach Sheni for a given Jewish year.
     *
     * @param  string|int $year
     * @return Carbon\Carbon
     */
    public static function dayOfPesachSheni($year)
    {
        return toSecular(9, 14, $year);
    }

    /**
     * Gets the first day of Shavuos for a given Jewish year.
     *
     * @param  string|int $year
     * @return Carbon\Carbon
     */
    public static function firstDayOfShavuos($year)
    {
        return toSecular(10, 6, $year);
    }

    /**
     * Gets the first day of Rosh Hashana for a given Jewish year.
     *
     * @param  string|int $year
     * @return Carbon\Carbon
     */
    public static function firstDayOfRoshHashana($year)
    {
        return toSecular(1, 1, $year);
    }

    /**
     * Gets the day of Yom Kippur for a given Jewish year.
     *
     * @param  string|int $year
     * @return Carbon\Carbon
     */
    public static function dayOfYomKippur($year)
    {
        return toSecular(1, 10, $year);
    }

    /**
     * Gets the first day of Sukkos for a given Jewish year.
     *
     * @param  string|int $year
     * @return Carbon\Carbon
     */
    public static function firstDayOfSukkos($year)
    {
        return toSecular(1, 15, $year);
    }

    /**
     * Gets the day of Shmini Atzeres for a given Jewish year.
     *
     * @param  string|int $year
     * @return Carbon\Carbon
     */
    public static function dayOfShminiAtzeres($year)
    {
        return toSecular(1, 22, $year);
    }

    /**
     * Gets the day of Shmini Atzeres for a given Jewish year.
     *
     * @param  string|int $year
     * @return Carbon\Carbon
     */
    public static function dayOfSimchasTorah($year, $galus = true)
    {
        return toSecular(1, $galus ? 23 : 22, $year);
    }

    /**
     * Gets the first day of Chanuka for a given Jewish year.
     *
     * @param  string|int $year
     * @return Carbon\Carbon
     */
    public static function firstDayOfChanuka($year)
    {
        return toSecular(3, 25, $year);
    }

    /**
     * Gets the day of Tu Bishvat for a given Jewish year.
     *
     * @param  string|int $year
     * @return Carbon\Carbon
     */
    public static function dayOfTuBishvat($year)
    {
        return toSecular(5, 15, $year);
    }

    /**
     * Gets the day of Purim for a given Jewish year.
     *
     * @param  string|int $year
     * @return Carbon\Carbon
     */
    public static function dayOfPurim($year)
    {
        return toSecular(7, 14, $year);
    }

    /**
     * Gets the day of Shushan Purim for a given Jewish year.
     *
     * @param  string|int $year
     * @return Carbon\Carbon
     */
    public static function dayOfShushanPurim($year)
    {
        return toSecular(7, 15, $year)->isSaturday() ? toSecular(7, 16, $year) : toSecular(7, 15, $year);
    }

    /**
     * Gets the day of Purim Kattan for a given Jewish year.
     *
     * @param  string|int $year
     * @return Carbon\Carbon
     */
    public static function dayOfPurimKattan($year)
    {
        try {
            return toSecular(6, 14, $year);
        } catch (InvalidDateException $e) {
            throw new InvalidDateException("{$year} does not have a Purim Kattan because it is not a leap year.");
        }
    }

    /**
     * Pesach is from the 15th to the 22nd of Nisan in
     * Galus, and from the 15th to the 21st in E"Y.
     *
     * @param  bool $galus
     * @return bool
     */
    public function isPesach($galus = true)
    {
        return $this->carbon->gte(static::firstDayOfPesach($this->year))
            && $this->carbon->lte(static::firstDayOfPesach($this->year)->addDays($galus ? 7 : 6));
    }

    /**
     * Pesach Sheni is the 14th of Iyar.
     *
     * @return bool
     */
    public function isPesachSheni()
    {
        return $this->carbon->eq(static::dayOfPesachSheni($this->year));
    }

    /**
     * Shavuos is on the 6th and 7th of Sivan in
     * Galus, while it's just the 6th in E"Y.
     *
     * @param  bool $galus
     * @return bool
     */
    public function isShavuos($galus = true)
    {
        return $this->month === 10 && ($this->day === 6 || ($galus && $this->day === 7));
    }

    /**
     * Sukkos is from the 15th to the 21st of Tishrei.
     *
     * @return bool
     */
    public function isSukkos()
    {
        return $this->month === 1 && $this->day >= 15 && $this->day <= 21;
    }

    /**
     * Rosh Hashana is the first two days of Tishrei.
     *
     * @return bool
     */
    public function isRoshHashana()
    {
        return $this->month === 1 && ($this->day === 1 || $this->day === 2);
    }

    /**
     * Shmini Atzeres is the 22nd day of Tishrei.
     *
     * @return bool
     */
    public function isShminiAtzeres()
    {
        return $this->month === 1 && $this->day === 22;
    }

    /**
     * Simchas Torah is the 23rd day of Tishrei in
     * Galus, and the 22nd in E"Y. Ashrei Ha'am
     * SheHaShem Eloikov!!!!!!!!!!!!!!!!!!!!
     *
     * @return bool
     */
    public function isSimchasTorah($galus = true)
    {
        return $this->month === 1 && ($galus ? $this->day === 23 : $this->day === 22);
    }

    /**
     * Chanuka is 8 days from the 25th of Kislev.
     *
     * @return bool
     */
    public function isChanuka()
    {
        return $this->carbon->gte(static::firstDayOfChanuka($this->year))
            && $this->carbon->lte(static::firstDayOfChanuka($this->year)->addDays(7));
    }

    /**
     * Tu Bishvat is the 15th of Shvat.
     *
     * @return bool
     */
    public function isTuBishvat()
    {
        return $this->carbon->eq(static::dayOfTuBishvat($this->year));
    }

    /**
     * Purim is the 14th of Adar, or the 14th of
     * Adar Sheini when the year is meuberes.
     *
     * @return bool
     */
    public function isPurim()
    {
        return $this->carbon->eq(static::dayOfPurim($this->year));
    }

    /**
     * Purim Kattan is the 14th of Adar Rishon.
     *
     * @return bool
     */
    public function isPurimKattan()
    {
        return $this->carbon->eq(static::dayOfPurimKattan($this->year));
    }
}
