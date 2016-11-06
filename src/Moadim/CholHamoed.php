<?php

namespace Zmanim\Moadim;

trait CholHamoed
{
    /**
     * Checks if the date is Chol Hamoed.
     *
     * @return bool
     */
    public function isCholHamoed($galus = true)
    {
        return $this->isCholHamoedPesach($galus) || $this->isCholHamoedSukkos($galus);
    }

    /**
     * Chol Hamoed Pesach is from the 17th to the 20th of
     * Nisan in galus, and includes the 16th in E"Y.
     *
     * @return bool
     */
    public function isCholHamoedPesach($galus = true)
    {
        return $this->month === 8
            && $this->day <= 20
            && ($galus ? $this->day >= 17 : $this->day >= 16);
    }

    /**
     * Chol Hamoed Sukkos is from the 17th to the 21th of
     * Tishrei and includes the 16th in E"Y/
     *
     * @return bool
     */
    public function isCholHamoedSukkos($galus = true)
    {
        return $this->month === 1
            && $this->day <= 21
            && ($galus ? $this->day >= 17 : $this->day >= 16);
    }
}
