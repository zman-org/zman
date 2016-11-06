<?php

namespace Zmanim\Moadim;

trait Yuntif
{
    /**
     * Checks if the date is any one of the
     * yomim tovim.
     *
     * @param  bool $galus
     * @return bool
     */
    public function isYuntif($galus = true)
    {
        return $this->isPesach($galus)
            || $this->isShavuos($galus)
            || $this->isSukkos()
            || $this->isRoshHashana()
            || $this->isYomKippur()
            || $this->isShminiAtzeres()
            || $this->isSimchasTorah($galus);
    }

    /**
     * Pesach is from the 15th to the 22nd of Nisan in
     * Galus and from the 15th to the 21st in E"Y.
     *
     * @param  bool $galus
     * @return bool
     */
    public function isPesach($galus = true)
    {
        return $this->month === 8
            && ($this->day >= 15 && $galus ? $this->day <= 22 : $this->day <= 21);
    }

    /**
     * Shavuos is on the 6th and 7th of Sivan in Galus
     * and just the 6th in E"Y.
     *
     * @param  bool $galus
     * @return bool
     */
    public function isShavuos($galus = true)
    {
        return $this->month === 10
            && ($this->day === 6 || ($galus && $this->day === 7));
    }

    /**
     * Sukkos is from the 15th to the 21st of Tishrei.
     *
     * @return bool
     */
    public function isSukkos()
    {
        return $this->month === 1
            && $this->day >= 15 && $this->day <= 21;
    }

    /**
     * Rosh Hashana is the first two days of Tishrei.
     *
     * @return bool
     */
    public function isRoshHashana()
    {
        return $this->month === 1
            && $this->day === 1 || $this->day === 2;
    }

    /**
     * Shmini Atzeres is the 22nd day of Tishrei.
     *
     * @return bool
     */
    public function isShminiAtzeres()
    {
        return $this->month === 1
            && $this->day === 22;
    }

    /**
     * Simchas Torah is the 23rd day of Tishrei in
     * Galus, and the 22nd in E"Y. Ashrei Ha'am
     * SheHaShem Eloikov!
     *
     * @return bool
     */
    public function isSimchasTorah($galus = true)
    {
        return $this->month === 1
            && $galus ? $this->day === 23 : $this->day === 22;
    }
}
