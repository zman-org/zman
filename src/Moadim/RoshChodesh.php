<?php

namespace Zman\Moadim;

trait RoshChodesh
{
    /**
     * Checks if the date is a Rosh Chodesh.
     * Rosh Chodesh is chal on the 1st and
     * 30th of every single month.
     */
    public function isRoshChodesh(): bool
    {
        return $this->jewishDay === 30 || $this->jewishDay === 1;
    }
}
