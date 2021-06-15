<?php

namespace Zman\Getters;

trait MDY
{
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
            'Adar 1', isJewishLeapYear($year) ? 'Adar 2' : 'Adar',
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
            'אדר א', isJewishLeapYear($year) ? 'אדר ב' : 'אדר',
            'ניסן', 'אייר', 'סיון', 'תמוז', 'אב', 'אלול',
        ][$month - 1];
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
     * Get the Jewish year in Hebrew.
     *
     * @param  string|int $day
     * @return string
     */
    public function jewishYearHebrew($year)
    {
        return toHebrewNumber($year % 1000);
    }
}
