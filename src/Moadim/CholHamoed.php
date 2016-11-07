<?php

namespace Zmanim\Moadim;

trait CholHamoed
{
    /**
     * Checks if the date is Chol HaMoed.
     *
     * @return bool
     */
    public function isCholHamoed($galus = true)
    {
        return $this->isCholHamoedPesach($galus) || $this->isCholHamoedSukkos($galus);
    }

    /**
     * Chol Hamoed Pesach lasts from the 17th of
     * Nissan to the 20th of Nissan in Galus,
     * and also includes the 16th in E"Y.
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
     * Chol Hamoed Sukkos lasts from the 17th of
     * Tishrei to the 21st of Tishrei in Galus,
     * and also includes the 16th in E"Y.
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
