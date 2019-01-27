<?php

namespace Zman\Moadim;

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
        return $this->jewishDay === 30 || $this->jewishDay === 1;
    }

    /**
     * Checks if the date is a Rosh Chodesh
     * and Chanukah.
     *
     * @return bool
     */
    public function isRoshChodeshChanuka()
    {
        return $this->isRoshChodesh() && $this->isChanuka();
    }
}
