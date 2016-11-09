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
        return $this->jewishDay === 10 && $this->jewishMonth === 1;
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
        return ($this->jewishDay === 3 && $this->jewishMonth === 1 && !$this->isShabbos())
            || ($this->isSunday() && $this->jewishDay === 4 && $this->jewishMonth === 1);
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
        return $this->jewishDay === 10 && $this->jewishMonth === 4;
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
        return ($this->jewishDay === 13 && $this->jewishMonth === 7 && !$this->isShabbos())
            || ($this->jewishDay === 11 && $this->jewishMonth === 7 && $this->dayOfWeek === 4);
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
        return ($this->jewishDay === 17 && $this->jewishMonth === 11 && !$this->isShabbos())
        || ($this->jewishDay === 18 && $this->jewishMonth === 11 && $this->isSunday());
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
        return ($this->jewishDay === 9 && $this->jewishMonth === 12 && !$this->isShabbos())
        || ($this->jewishDay === 10 && $this->jewishMonth === 12 && $this->isSunday());
    }
}
