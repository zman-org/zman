<?php

namespace Zmanim\Tefilos;

trait Mussaf
{
    /**
     * Checks if the day has Mussaf.
     *
     * @return bool
     */
    public function hasMussaf()
    {
        return $this->isRoshChodesh()
            || $this->isYuntif()
            || $this->isCholHamoed();
    }
}
