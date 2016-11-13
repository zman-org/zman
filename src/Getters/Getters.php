<?php

namespace Zman\Getters;

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
            case $name === 'jewishDayHebrew':
                return $this->jewishDayHebrew($this->jewishDay);
            case $name === 'jewishYearHebrew':
                return toHebrewYear($this->jewishYear);
            case $name === 'jewishMonthName':
                return $this->jewishMonthNameEnglish($this->jewishMonth, $this->jewishYear);
            case $name === 'jewishMonthNameHebrew':
                return $this->jewishMonthNameHebrew($this->jewishMonth, $this->jewishYear);
            default:
                return parent::__get($name);
        }
    }

    /**
     * Get the Jewish day in Hebrew.
     *
     * @param  string|int $day
     * @return string
     */
    public function jewishDayHebrew($day)
    {
        return toHebrewNumber($day);
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
            'Tishrei', 'Cheshvan', 'Kislev', 'Teives', 'Shvat',
            'Adar 1', isLeapYear($year) ? 'Adar 2' : 'Adar',
            'Nissan', 'Iyar', 'Sivan', 'Tamuz', 'Av', 'Elul',
        ][$month - 1];
    }

    /**
     * Get the Jewish month name in Hebrew.
     *
     * @param  string|int $month
     * @param  string|int $year
     * @return string
     */
    public function jewishMonthNameHebrew($month, $year)
    {
        return [
            'תשרי', 'חשון', 'כסלו', 'טבת', 'שבט',
            'אדר א', isLeapYear($year) ? 'אדר ב' : 'אדר',
            'ניסן', 'אייר', 'סיון', 'תמוז', 'אב', 'אלול',
        ][$month - 1];
    }
}
