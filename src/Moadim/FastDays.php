<?php

namespace Zmanim\Moadim;

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
     * Yom Kippur is on the 10th of Tishrei no matter
     * what, it is even docheh Shabbos.
     *
     * @return bool
     */
    public function isYomKippur()
    {
        return $this->day === 10 && $this->month === 1;
    }

    /**
     * Tzom Gedaliah falls on the 3rd of Tishrei, unless
     * it falls on Shabbos in which case it is moved
     * to the following day.
     *
     * @return bool
     */
    public function isTzomGedaliah()
    {
        return ($this->day === 3 && $this->month === 1 && !$this->isShabbos())
            || ($this->isSunday() && $this->day === 4 && $this->month === 1);
    }

    /**
     * Asara Biteives always falls on the 10th of teivies. In
     * the current calendar system it is impossible for it to
     * fall out on Shabbos, but theoritically is even dochech.
     *
     * @return bool
     */
    public function isAsaraBiteives()
    {
        return $this->day === 10 && $this->month === 4;
    }

    /**
     * Taanis Esther falls on the 13th of Adar, unless Purim falls
     * on a Sunday, in which case the taanis is moved up to the
     * preceding Thursday.
     *
     * @return bool
     */
    public function isTaanisEsther()
    {
        return ($this->day === 13 && $this->month === 7 && !$this->isShabbos())
            || ($this->day === 11 && $this->month === 7 && $this->dayOfWeek === 4);
    }

    /**
     * Shiva Asar Bitamuz falls on the 17th of tamuz, unless
     * that day is Shabbos in which case it is nidcheh to
     * the next day (Sunday).
     *
     * @return bool
     */
    public function isShivaAsarBitamuz()
    {
        return ($this->day === 17 && $this->month === 11 && !$this->isShabbos())
        || ($this->day === 18 && $this->month === 11 && $this->isSunday());
    }

    /**
     * Tisha Bav falls on the 9th of Av, unless that
     * day is Shabbos in which case it is nidcheh
     * to the next day (Sunday).
     *
     * @return bool
     */
    public function isTishaBav()
    {
        return ($this->day === 9 && $this->month === 12 && !$this->isShabbos())
        || ($this->day === 10 && $this->month === 12 && $this->isSunday());
    }

    /**
     * Check if the date is a Sunday, to assist
     * in determining fasts that are nidcheh.
     *
     * @return bool
     */
    public function isSunday()
    {
        return $this->dayOfWeek === 0;
    }
}
