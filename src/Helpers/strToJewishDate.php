<?php

use Gematria\Gematria;

/**
 * List of Hebrew months with aliases
 */
define('HEBREW_MONTHS', [
    'תשרי',
    'מרחשוון' => [
        'חשוון',
        'מרחשון',
        'חשון',
    ],
    'כסלו' => [
        'כסליו',
    ],
    'טבת',
    'שבט',
    'אדר' => [
        'אדר א',
    ],
    'אדר ב',
    'ניסן',
    'אייר' => [
        'איר',
    ],
    'סיוון' => [
        'סיון',
    ],
    'תמוז',
    'אב' => [
        'מנחם־אב',
        'מנחם-אב',
    ],
    'אלול',
]);

if (!function_exists('strToJewishDate')) {
    /**
     * Convert string of Jewish date to array of numbers
     *
     * @param  string $str
     * @return array
     */
    function strToJewishDate($str)
    {
        // clean
        $removedCharacters = ['\'', '"', '׳', '״'];
        $str = str_replace($removedCharacters, '', $str);

        // explode string to day, month & year
        $hebdate = explode(' ', $str);
        $day = $hebdate[0];
        if (count($hebdate) == 4 && $hebdate[1] == 'אדר' && in_array($hebdate[2], ['א', 'ב'])) {
            // leap Adar
            $month = $hebdate[1] . ' ' . $hebdate[2];
            $year = $hebdate[3];
        }
        elseif (count($hebdate) == 3) {
            // regular date
            $month = $hebdate[1];
            $year = $hebdate[2];
        }
        else {
            // date format not supported
            return false;
        }

        /* convert day to number */
        $gematriaDay = new Gematria($day);
        $dayNumber = $gematriaDay->get();

        
        // remove bet
        if (mb_strpos($month, 'ב') === 0) {
            $month = mb_substr($month, 1);
        }
        /* convert month to number */
        $monthCounter = 1;
        $monthNumbers = [];
        foreach (HEBREW_MONTHS as $monthKey => $monthValue) {
            if (is_array($monthValue)) {
                // replace aliases
                $month = str_replace($monthValue, $monthKey, $month);
                $monthNumbers[$monthKey] = $monthCounter;
            }
            else {
                $monthNumbers[$monthValue] = $monthCounter;
            }
            $monthCounter++;
        }
        if (!array_key_exists($month, $monthNumbers)) {
            // month name not exists
            return false;
        }
        else {
            $monthNumber = $monthNumbers[$month];
        }

        /* convert year to number */
        $firstLetter = mb_substr($year, 0 ,1);
        if (mb_strlen($year) > 1 && $firstLetter >= 'א' && $firstLetter < 'ט'){
            // prefix of Alafim
            $year = mb_substr($year, 1);
            $gematriaPrefix = new Gematria($firstLetter);
            $yearNumber = $gematriaPrefix->get() * 1000;
        }
        else {
            // add 5000 to short year format
            $yearNumber = 5000;
        }
        $gematriaYear = new Gematria($year);
        $yearNumber += $gematriaYear->get();

        return [$monthNumber, $dayNumber, $yearNumber];
    }
}