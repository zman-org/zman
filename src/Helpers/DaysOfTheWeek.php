<?php

namespace Zman\Helpers;

trait DaysOfTheWeek
{
    /**
     * Checks if the day is Shabbos.
     */
    public function isShabbos(): bool
    {
        return $this->isSaturday();
    }
}
