<?php

namespace Zmanim\Helpers;

trait DaysOfTheWeek
{
    /**
     * Checks if the day is Sunday.
     *
     * @return bool
     */
    public function isSunday()
    {
        return $this->dayOfWeek === 0;
    }

    /**
     * Checks if the day is Monday.
     *
     * @return bool
     */
    public function isMonday()
    {
        return $this->dayOfWeek === 1;
    }

    /**
     * Checks if the day is Tuesday.
     *
     * @return bool
     */
    public function isTuesday()
    {
        return $this->dayOfWeek === 2;
    }

    /**
     * Checks if the day is Wednesday.
     *
     * @return bool
     */
    public function isWednesday()
    {
        return $this->dayOfWeek === 3;
    }

    /**
     * Checks if the day is Thursday.
     *
     * @return bool
     */
    public function isThursday()
    {
        return $this->dayOfWeek === 4;
    }

    /**
     * Checks if the day is Friday.
     *
     * @return bool
     */
    public function isFriday()
    {
        return $this->dayOfWeek === 5;
    }

    /**
     * Checks if the day is Shabbos.
     *
     * @return bool
     */
    public function isShabbos()
    {
        return $this->dayOfWeek === 6;
    }
}
