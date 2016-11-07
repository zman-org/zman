<?php

namespace Zmanim\Setters;

trait Setters
{
    /**
     * Allow for setting the Zman's properties
     * via the Magic SET methods for a nice
     * and familiar syntax. That's cool!
     *
     * @param  string $name
     * @return mixed
     */
    public function __set($name, $value)
    {
        switch (true) {
            case $name === 'day':
                $this->setDate($this->month, $value, $this->year);
            case $name === 'month':
                $this->setDate($value, $this->day, $this->year);
            case $name === 'year':
                $this->setDate($this->month, $this->day, $value);
            default:
                return $this->carbon->__set($name, $value);
        }
    }

    /**
     * Explicitly set the date without any validation.
     *
     * @param string|int $month
     * @param string|int $day
     * @param string|int $year
     */
    public function setDate($month, $day, $year)
    {
        $this->jdate['month'] = (int) $month;
        $this->jdate['day']   = (int) $day;
        $this->jdate['year']  = (int) $year;
    }

    /**
     * Update the Jewish date when performing modifications.
     *
     * @param  string $modify
     * @return this
     */
    public function modify($modify)
    {
        $this->carbon->modify($modify);
        $this->jdate = explode('/', toJewish($this->carbon->month, $this->carbon->day, $this->carbon->year));

        return $this;
    }
}
