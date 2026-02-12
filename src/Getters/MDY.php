<?php

namespace Zman\Getters;

trait MDY
{
    /**
     * Get the Jewish month name in English.

     */
    public function jewishMonthNameEnglish(int $month, int $year): string
    {
        return [
            'Tishrei', 'Cheshvan', 'Kislev', 'Teives', 'Shvat',
            'Adar 1', isJewishLeapYear($year) ? 'Adar 2' : 'Adar',
            'Nissan', 'Iyar', 'Sivan', 'Tamuz', 'Av', 'Elul',
        ][$month - 1];
    }

    /**
     * Get the Jewish month name in Hebrew.
     */
    public function jewishMonthNameHebrew(int $month, int $year): string
    {
        return [
            'תשרי', 'חשון', 'כסלו', 'טבת', 'שבט',
            'אדר א', isJewishLeapYear($year) ? 'אדר ב' : 'אדר',
            'ניסן', 'אייר', 'סיון', 'תמוז', 'אב', 'אלול',
        ][$month - 1];
    }

    /**
     * Get the Jewish day in Hebrew.
     */
    public function jewishDayHebrew(int $day): string
    {
        return toHebrewNumber($day);
    }

    /**
     * Get the Jewish year in Hebrew.
     */
    public function jewishYearHebrew(int $year): string
    {
        return toHebrewNumber($year % 1000);
    }
}
