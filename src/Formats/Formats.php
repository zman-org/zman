<?php

namespace Zmanim\Formats;

trait Formats
{
    /**
     * Format the instance as Jewish date.
     *
     * @return string
     */
    public function toJewishDateString()
    {
        return "{$this->jewishYear}-{$this->jewishMonth}-{$this->jewishDay}";
    }

    /**
     * Format the instance as Jewish date and time.
     *
     * @return string
     */
    public function toJewishDateTimeString()
    {
        return "{$this->jewishYear}-{$this->jewishMonth}-{$this->jewishDay} {$this->toTimeString()}";
    }

    /**
     * Format the instance as a readable Jewish date.
     *
     * @return string
     */
    public function toFormattedJewishDateString()
    {
        return "{$this->jewishDay} {$this->jewishMonthName}, {$this->jewishYear}";
    }

    /**
     * Format the instance as a readable Jewish date in Hebrew.
     *
     * @return string
     */
    public function toFormattedJewishHebrewDateString()
    {
        return "{$this->jewishDayHebrew} {$this->jewishMonthNameHebrew}, {$this->jewishYearHebrew}";
    }
}
