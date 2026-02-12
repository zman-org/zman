<?php

namespace Zman\Setters;

use Carbon\Carbon;

trait Setters
{
    /**
     * Allow for setting the Zman's properties
     * via the Magic SET methods for a nice
     * and familiar syntax. That's cool!
     * 
     * @param string $name
     * @param string|int|DateTimeZone $value
     */
    public function __set($name, $value): void
    {
        match ($name) {
            'jewishDay' => $this->setJewishDate($this->jewishMonth, $value, $this->jewishYear),
            'jewishMonth' => $this->setJewishDate($value, $this->jewishDay, $this->jewishYear),
            'jewishYear' => $this->setJewishDate($this->jewishMonth, $this->jewishDay, $value),
            default => parent::__set($name, $value),
        };
    }

    /**
     * Explicitly set the Jewish day without any validation.
     */
    public function jewishDay(int $value): static
    {
        $this->__set('jewishDay', $value);

        return $this;
    }

    /**
     * Explicitly set the Jewish month without any validation.
     */
    public function jewishMonth(int $value): static
    {
        $this->__set('jewishMonth', $value);

        return $this;
    }

    /**
     * Explicitly set the Jewish year without any validation.
     */
    public function jewishYear(int $value): static
    {
        $this->__set('jewishYear', $value);

        return $this;
    }

    /**
     * Explicitly set the date without any validation.
     */
    public function setJewishDate(int $month, int $day, int $year): static
    {
        $this->jdate['month'] = (int) $month;
        $this->jdate['day'] = (int) $day;
        $this->jdate['year'] = (int) $year;

        return $this;
    }

    /**
     * Update the Jewish date when performing modifications.
     * 
     * @param string $modify
     * @return static
     */
    public function modify($modify)
    {
        parent::modify($modify);
        list($this->jdate['month'], $this->jdate['day'], $this->jdate['year'])
            = explode('/', toJewish($this->month, $this->day, $this->year));

        return $this;
    }
}
