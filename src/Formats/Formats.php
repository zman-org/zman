<?php

namespace Zman\Formats;

trait Formats
{
    /**
     * Format the instance as Jewish date.
     */
    public function toJewishDateString(): string
    {
        return "{$this->jewishYear}-{$this->jewishMonth}-{$this->jewishDay}";
    }

    /**
     * Format the instance as Jewish date and time.
     */
    public function toJewishDateTimeString(): string
    {
        return "{$this->jewishYear}-{$this->jewishMonth}-{$this->jewishDay} {$this->toTimeString()}";
    }

    /**
     * Format the instance as a readable Jewish date.
     */
    public function toFormattedJewishDateString(): string
    {
        return "{$this->jewishDay} {$this->jewishMonthName}, {$this->jewishYear}";
    }

    /**
     * Format the instance as a readable Jewish date in Hebrew.
     */
    public function toFormattedJewishHebrewDateString(): string
    {
        return "{$this->jewishDayHebrew} {$this->jewishMonthNameHebrew}, {$this->jewishYearHebrew}";
    }
}
