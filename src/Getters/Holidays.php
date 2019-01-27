<?php

namespace Zman\Getters;

trait Holidays
{
    /**
     * Get the day's holidays in English.
     *
     * @return array
     */
    public function holidaysEnglish()
    {
        return $this->holidays('english');
    }

    /**
     * Get the day's holidays in Hebrew.
     *
     * @return array
     */
    public function holidaysHebrew()
    {
        return $this->holidays('hebrew');
    }

    /**
     * Get the day's holidays.
     *
     * @param  string  $format
     * @return array
     */
    private function holidays($format)
    {
        $holidays = [];

        foreach (HOLIDAYS as $holiday => $formats) {
            $getter = 'is'.str_replace(' ', '', $holiday);

            if (!$this->isJewishLeapYear() && $getter === 'isPurimKattan') {
                continue;
            }

            if ($this->$getter()) {
                $holidays[] = HOLIDAYS[$holiday][$format];
            }
        }

        return $holidays;
    }

    /**
     * Look up the formatted holiday name.
     *
     * @param  string  $english
     * @param  string  $format
     * @return string
     */
    private function holiday($english, $format)
    {
        return HOLIDAYS[$english][$format];
    }
}
