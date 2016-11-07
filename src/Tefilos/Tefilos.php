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

    // public function hasTachanun()
    // public function hasSlichos()
    // public function hasHallel()
    // public function hasMussaf()
}
