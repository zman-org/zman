<?php

namespace Zmanim\Getters;

trait Getters
{
    /**
     * Attach properties to the Zman object so
     * they may be accessed conveniently by
     * the familiar GET property syntax.
     *
     * @param  string $name
     * @return mixed
     */
    public function __get($name)
    {
        switch (true) {
            case $name === 'day':
                return (int) $this->date[1];
            case $name === 'month':
                return (int) $this->date[0];
            case $name === 'year':
                return (int) $this->date[2];
            case $name === 'monthName':
                return $this->getEnglishMonthName($this->date[0], $this->date[2]);
            default:
                return parent::__get($name);
        }
    }

    /**
     * Get the Jewish month name in English.
     *
     * @param  string|int $month
     * @param  string|int $year
     * @return string
     */
    public function getEnglishMonthName($month, $year)
    {
        return [
            'Tishrei', 'Cheshvan', 'Kislev', 'Teves', 'Shvat',
            'Adar 1', isLeapYear($year) ? 'Adar 2' : 'Adar',
            'Nissan', 'Iyar', 'Sivan', 'Tamuz', 'Av', 'Elul'
        ][$month - 1];
    }
}
