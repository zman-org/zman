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
            case $name === 'jewishDay':
                return (int) $this->jdate['day'];
            case $name === 'jewishMonth':
                return (int) $this->jdate['month'];
            case $name === 'jewishYear':
                return (int) $this->jdate['year'];
            case $name === 'jewishMonthName':
                return $this->jewishMonthNameEnglish($this->jdate['month'], $this->jdate['year']);
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
    public function jewishMonthNameEnglish($month, $year)
    {
        return [
            'Tishrei', 'Cheshvan', 'Kislev', 'Teves', 'Shvat',
            'Adar 1', isLeapYear($year) ? 'Adar 2' : 'Adar',
            'Nissan', 'Iyar', 'Sivan', 'Tamuz', 'Av', 'Elul',
        ][$month - 1];
    }
}
