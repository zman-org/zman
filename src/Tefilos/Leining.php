<?php

namespace Zmanim\Tefilos;

trait Leining
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
}
