<?php

namespace Zman\Setters;

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
        switch ($name) {
            case 'jewishDay':
                return $this->setJewishDate($this->jewishMonth, $value, $this->jewishYear);
            case 'jewishMonth':
                return $this->setJewishDate($value, $this->jewishDay, $this->jewishYear);
            case 'jewishYear':
                return $this->setJewishDate($this->jewishMonth, $this->jewishDay, $value);
            default:
                return parent::__set($name, $value);
        }
    }

    /**
     * Explicitly set the Jewish day without any validation.
     *
     * @param  string|int $value
     * @return $this
     */
    public function jewishDay($value)
    {
        return $this->__set('jewishDay', $value);
    }

    /**
     * Explicitly set the Jewish month without any validation.
     *
     * @param  string|int $value
     * @return $this
     */
    public function jewishMonth($value)
    {
        return $this->__set('jewishMonth', $value);
    }

    /**
     * Explicitly set the Jewish year without any validation.
     *
     * @param  string|int $value
     * @return $this
     */
    public function jewishYear($value)
    {
        return $this->__set('jewishYear', $value);
    }

    /**
     * Explicitly set the date without any validation.
     *
     * @param  string|int $month
     * @param  string|int $day
     * @param  string|int $year
     * @return $this
     */
    public function setJewishDate($month, $day, $year)
    {
        $this->jdate['month'] = (int) $month;
        $this->jdate['day'] = (int) $day;
        $this->jdate['year'] = (int) $year;

        return $this;
    }

    /**
     * Update the Jewish date when performing modifications.
     *
     * @param  string $modify
     * @return $this
     */
    public function modify($modify)
    {
        parent::modify($modify);
        list($this->jdate['month'], $this->jdate['day'], $this->jdate['year'])
            = explode('/', toJewish($this->month, $this->day, $this->year));

        return $this;
    }
}
