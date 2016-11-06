<?php

namespace Zmanim\Helpers;

trait DaysOfTheWeek
{
    /**
     * Checks if the day is Shabbos.
     *
     * @return bool
     */
    public function isShabbos()
    {
        return $this->isSaturday();
    }
}
