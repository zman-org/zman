<?php

namespace Zman\Moadim;

use Zman\Zman;

trait Holidays
{
    /**
     * Gets the first day of Pesach for a given Jewish year.
     */
    public static function firstDayOfPesach(int $year): Zman
    {
        return toSecular(8, 15, $year);
    }

    /**
     * Gets the day of Pesach Sheni for a given Jewish year.
     */
    public static function dayOfPesachSheni(int $year): Zman
    {
        return toSecular(9, 14, $year);
    }

    /**
     * Gets the first day of Shavuos for a given Jewish year.
     */
    public static function firstDayOfShavuos(int $year): Zman
    {
        return toSecular(10, 6, $year);
    }

    /**
     * Gets the first day of Rosh Hashana for a given Jewish year.
     */
    public static function firstDayOfRoshHashana(int $year): Zman
    {
        return toSecular(1, 1, $year);
    }

    /**
     * Gets the first day of Sukkos for a given Jewish year.
     */
    public static function firstDayOfSukkos(int $year): Zman
    {
        return toSecular(1, 15, $year);
    }

    /**
     * Gets the day of Shmini Atzeres for a given Jewish year.
     */
    public static function dayOfShminiAtzeres(int $year): Zman
    {
        return toSecular(1, 22, $year);
    }

    /**
     * Gets the day of Simchas Torah for a given Jewish year.
     */
    public static function dayOfSimchasTorah(int $year, bool $galus = true): Zman
    {
        return toSecular(1, $galus ? 23 : 22, $year);
    }

    /**
     * Gets the first day of Chanuka for a given Jewish year.
     */
    public static function firstDayOfChanuka(int $year): Zman
    {
        return toSecular(3, 25, $year);
    }

    /**
     * Gets the day of Tu Bishvat for a given Jewish year.
     */
    public static function dayOfTuBishvat(int $year): Zman
    {
        return toSecular(5, 15, $year);
    }

    /**
     * Gets the day of Purim for a given Jewish year.
     */
    public static function dayOfPurim(int $year): Zman
    {
        return toSecular(7, 14, $year);
    }

    /**
     * Gets the day of Shushan Purim for a given Jewish year.
     */
    public static function dayOfShushanPurim(int $year): Zman
    {
        return toSecular(7, 15, $year)->isSaturday() ? toSecular(7, 16, $year) : toSecular(7, 15, $year);
    }

    /**
     * Gets the day of Purim Kattan for a given Jewish year.
     */
    public static function dayOfPurimKattan(int $year): Zman
    {
        return toSecular(6, 14, $year);
    }

    /**
     * Pesach is from the 15th to the 22nd of Nisan in
     * Galus, and from the 15th to the 21st in E"Y.
     */
    public function isPesach(?bool $galus = null): bool
    {
        $galus = $this->getGalusMode($galus);

        return $this->gte(static::firstDayOfPesach($this->jewishYear))
            && $this->lte(static::firstDayOfPesach($this->jewishYear)->addDays($galus ? 7 : 6)->endOfDay());
    }

    /**
     * Pesach Sheni is the 14th of Iyar.
     */
    public function isPesachSheni(): bool
    {
        return $this->isSameDay(static::dayOfPesachSheni($this->jewishYear));
    }

    /**
     * Shavuos is on the 6th and 7th of Sivan in
     * Galus, while it's just the 6th in E"Y.
     */
    public function isShavuos(?bool $galus = null): bool
    {
        $galus = $this->getGalusMode($galus);

        return $this->jewishMonth === 10 && ($this->jewishDay === 6 || ($galus && $this->jewishDay === 7));
    }

    /**
     * Sukkos is from the 15th to the 21st of Tishrei.
     */
    public function isSukkos(): bool
    {
        return $this->jewishMonth === 1 && $this->jewishDay >= 15 && $this->jewishDay <= 21;
    }

    /**
     * Rosh Hashana is the first two days of Tishrei.
     */
    public function isRoshHashana(): bool
    {
        return $this->jewishMonth === 1 && ($this->jewishDay === 1 || $this->jewishDay === 2);
    }

    /**
     * Shmini Atzeres is the 22nd day of Tishrei.
     */
    public function isShminiAtzeres(): bool
    {
        return $this->jewishMonth === 1 && $this->jewishDay === 22;
    }

    /**
     * Simchas Torah is the 23rd day of Tishrei in
     * Galus, and the 22nd in E"Y. Ashrei Ha'am
     * SheHaShem Eloikov!!!!!!!!!!!!!!!!!!!!
     */
    public function isSimchasTorah(?bool $galus = null): bool
    {
        $galus = $this->getGalusMode($galus);

        return $this->jewishMonth === 1 && ($galus ? $this->jewishDay === 23 : $this->jewishDay === 22);
    }

    /**
     * Chanuka is 8 days from the 25th of Kislev.
     */
    public function isChanuka(): bool
    {
        return $this->gte(static::firstDayOfChanuka($this->jewishYear))
            && $this->lte(static::firstDayOfChanuka($this->jewishYear)->addDays(7)->endOfDay());
    }

    /**
     * Tu Bishvat is the 15th of Shvat.
     */
    public function isTuBishvat(): bool
    {
        return $this->isSameDay(static::dayOfTuBishvat($this->jewishYear));
    }

    /**
     * Purim is the 14th of Adar, or the 14th of
     * Adar Sheini when the year is meuberes.
     */
    public function isPurim(): bool
    {
        return $this->isSameDay(static::dayOfPurim($this->jewishYear));
    }

    /**
     * Shushan Purim is usually 15th of Adar, but it
     * gets pushed to the 16th if it was Shabbos.
     */
    public function isShushanPurim(): bool
    {
        return $this->isSameDay(static::dayOfShushanPurim($this->jewishYear));
    }

    /**
     * Purim Kattan is the 14th of Adar Rishon.
     */
    public function isPurimKattan(): bool
    {
        return $this->isSameDay(static::dayOfPurimKattan($this->jewishYear));
    }
}
