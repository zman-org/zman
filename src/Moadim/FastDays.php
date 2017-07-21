<?php

namespace Zman\Moadim;

trait FastDays
{
    /**
     * Checks if the date is any one
     * of the fast days.
     *
     * @return bool
     */
    public function isFastDay()
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
     *
     * @param  string|int $year
     * @return Zman\Zman
     */
    public static function dayOfYomKippur($year)
    {
        return toSecular(1, 10, $year);
    }

    /**
     * Checks if the day is Yom Kippur.
     *
     * @return bool
     */
    public function isYomKippur()
    {
        return $this->isSameDay(static::dayOfYomKippur($this->jewishYear));
    }

    /**
     * Tzom Gedaliah falls on the 3rd of Tishrei, unless
     * it occurs on Shabbos in which case it is moved
     * to the following day, the 4th of the month.
     *
     * @param  string|int $year
     * @return Zman\Zman
     */
    public static function dayOfTzomGedaliah($year)
    {
        $tzom = toSecular(1, 3, $year);

        return !$tzom->isShabbos() ? $tzom : $tzom->addDay();
    }

    /**
     * Checks if the day is Tzom Gedaliah.
     *
     * @return bool
     */
    public function isTzomGedaliah()
    {
        return $this->isSameDay(static::dayOfTzomGedaliah($this->jewishYear));
    }

    /**
     * Asara Biteives always falls on the 10th of Teives.
     *
     * @param  string|int $year
     * @return Zman\Zman
     */
    public static function dayOfAsaraBiteives($year)
    {
        return toSecular(4, 10, $year);
    }

    /**
     * Checks if the day is Asara Biteives.
     *
     * @return bool
     */
    public function isAsaraBiteives()
    {
        return $this->isSameDay(static::dayOfAsaraBiteives($this->jewishYear));
    }

    /**
     * Taanis Esther falls on the 13th of Adar, unless Purim falls
     * on a Sunday, in which case the taanis is moved up to the
     * preceding Thursday because it is not dochech Shabbos.
     *
     * @param  string|int $year
     * @return Zman\Zman
     */
    public static function dayOfTaanisEsther($year)
    {
        $tzom = toSecular(7, 13, $year);

        return !$tzom->isShabbos() ? $tzom : $tzom->subDays(2);
    }

    /**
     * Checks if the day is Taanis Esther.
     *
     * @return bool
     */
    public function isTaanisEsther()
    {
        return $this->isSameDay(static::dayOfTaanisEsther($this->jewishYear));
    }

    /**
     * Shiva Asar Bitamuz is usually the 17th of Tamuz,
     * unless it's Shabbos, then it will be nidcheh.
     *
     * @param  string|int $year
     * @return Zman\Zman
     */
    public static function dayOfShivaAsarBitamuz($year)
    {
        $tzom = toSecular(11, 17, $year);

        return !$tzom->isShabbos() ? $tzom : $tzom->addDay();
    }

    /**
     * Checks if the day is Shiva Asar Bitamuz.
     *
     * @return bool
     */
    public function isShivaAsarBitamuz()
    {
        return $this->isSameDay(static::dayOfShivaAsarBitamuz($this->jewishYear));
    }

    /**
     * Tisha Bav falls on the 9th of Av, unless that
     * day is Shabbos in which case it is nidcheh
     * to the 10th of the month, the next day.
     *
     * @param  string|int $year
     * @return Zman\Zman
     */
    public static function dayOfTishaBav($year)
    {
        $tzom = toSecular(12, 9, $year);

        return !$tzom->isShabbos() ? $tzom : $tzom->addDay();
    }

    /**
     * Checks if the day is Tisha Bav.
     *
     * @return bool
     */
    public function isTishaBav()
    {
        return $this->isSameDay(static::dayOfTishaBav($this->jewishYear));
    }
}
