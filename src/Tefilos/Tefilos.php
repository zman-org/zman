<?php

namespace Zmanim\Tefilos;

trait Tefilos
{
    /**
     * Checks if the day has Krias HaTorah.
     *
     * @return bool
     */
    public function hasLeining()
    {
        return $this->isMonday()
            || $this->isThursday()
            || $this->isShabbos()
            || $this->isRoshChodesh()
            || $this->isFastDay()
            || $this->isYuntif()
            || $this->isCholHamoed()
            || $this->isChanuka()
            || $this->isPurim();
    }

    /**
     * Checks if the day has Hallel.
     *
     * @return bool
     */
    public function hasHallel($galus = true)
    {
        return $this->isPesach($galus)
            || $this->isShavuos($galus)
            || $this->isSukkos()
            || $this->isShminiAtzeres()
            || $this->isSimchasTorah($galus)
            || $this->isChanuka()
            || $this->isRoshChodesh();
    }

    // public function hasTachanun()
    // public function hasSlichos()
    // public function hasMussaf()
}
