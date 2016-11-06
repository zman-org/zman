<?php

namespace Zmanim\Moadim;

trait RoshChodesh
{
    /**
     * Checks if the date is a Rosh Chodesh.
     * Rosh Chodesh is chal on the 1st and
     * 30th of every single month.
     *
     * @return bool
     */
    public function isRoshChodesh()
    {
        return $this->day === 30 || $this->day === 1;
    }
}
