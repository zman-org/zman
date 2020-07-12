<?php

namespace Zman\Getters;

trait Holidays
{
    /**
     * Get the day's holidays in English.
     *
     * @return array
     */
    public function holidaysEnglish($galus = null)
    {
        return $this->holidays('english');
    }

    /**
     * Get the day's holidays in Hebrew.
     *
     * @return array
     */
    public function holidaysHebrew($galus = null)
    {
        return $this->holidays('hebrew');
    }

    /**
     * Get the day's holidays.
     *
     * @param  string  $format
     * @return array
     */
    private function holidays($format, $galus = null)
    {
        if (!is_null($galus)) {
            $current_galus = $this->galus;
            $this->galus = $galus;
        }

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

        if (!is_null($galus)) {
            $this->galus = $current_galus;
        }

        return $holidays;
    }
}
