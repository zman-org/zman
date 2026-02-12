<?php

namespace Zman\Moadim;

use Zman\Zman;

trait FastDays
{
    /**
     * Checks if the date is any one
     * of the fast days.
     */
    public function isFastDay(): bool
    {
        return $this->isYomKippur()
            || $this->isTzomGedaliah()
            || $this->isAsaraBiteives()
            || $this->isTaanisEsther()
            || $this->isShivaAsarBitamuz()
            || $this->isTishaBav();
    }

    /**
     * Yom Kippur is always the 10th of Tishrei.
     */
    public static function dayOfYomKippur(int $year): Zman
    {
        return toSecular(1, 10, $year);
    }

    /**
     * Checks if the day is Yom Kippur.
     */
    public function isYomKippur(): bool
    {
        return $this->isSameDay(static::dayOfYomKippur($this->jewishYear));
    }

    /**
     * Tzom Gedaliah falls on the 3rd of Tishrei, unless
     * it occurs on Shabbos in which case it is moved
     * to the following day, the 4th of the month.
     */
    public static function dayOfTzomGedaliah(int $year): Zman
    {
        $tzom = toSecular(1, 3, $year);

        return !$tzom->isShabbos() ? $tzom : $tzom->addDay();
    }

    /**
     * Checks if the day is Tzom Gedaliah.
     */
    public function isTzomGedaliah(): bool
    {
        return $this->isSameDay(static::dayOfTzomGedaliah($this->jewishYear));
    }

    /**
     * Asara Biteives always falls on the 10th of Teives.
     */
    public static function dayOfAsaraBiteives(int $year): Zman
    {
        return toSecular(4, 10, $year);
    }

    /**
     * Checks if the day is Asara Biteives.
     */
    public function isAsaraBiteives(): bool
    {
        return $this->isSameDay(static::dayOfAsaraBiteives($this->jewishYear));
    }

    /**
     * Taanis Esther falls on the 13th of Adar, unless Purim falls
     * on a Sunday, in which case the taanis is moved up to the
     * preceding Thursday because it is not dochech Shabbos.
     */
    public static function dayOfTaanisEsther(int $year): Zman
    {
        $tzom = toSecular(7, 13, $year);

        return !$tzom->isShabbos() ? $tzom : $tzom->subDays(2);
    }

    /**
     * Checks if the day is Taanis Esther.
     */
    public function isTaanisEsther(): bool
    {
        return $this->isSameDay(static::dayOfTaanisEsther($this->jewishYear));
    }

    /**
     * Shiva Asar Bitamuz is usually the 17th of Tamuz,
     * unless it's Shabbos, then it will be nidcheh.
     */
    public static function dayOfShivaAsarBitamuz(int $year): Zman
    {
        $tzom = toSecular(11, 17, $year);

        return !$tzom->isShabbos() ? $tzom : $tzom->addDay();
    }

    /**
     * Checks if the day is Shiva Asar Bitamuz.
     */
    public function isShivaAsarBitamuz(): bool
    {
        return $this->isSameDay(static::dayOfShivaAsarBitamuz($this->jewishYear));
    }

    /**
     * Tisha Bav falls on the 9th of Av, unless that
     * day is Shabbos in which case it is nidcheh
     * to the 10th of the month, the next day.
     */
    public static function dayOfTishaBav(int $year): Zman
    {
        $tzom = toSecular(12, 9, $year);

        return !$tzom->isShabbos() ? $tzom : $tzom->addDay();
    }

    /**
     * Checks if the day is Tisha Bav.
     */
    public function isTishaBav(): bool
    {
        return $this->isSameDay(static::dayOfTishaBav($this->jewishYear));
    }
}
