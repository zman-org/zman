<?php

namespace Zman\Getters;

trait Holidays
{
    /**
     * Get the day's holidays in English.
     */
    public function holidaysEnglish(): array
    {
        return $this->holidays('english');
    }

    /**
     * Get the day's holidays in Hebrew.
     */
    public function holidaysHebrew(): array
    {
        return $this->holidays('hebrew');
    }

    /**
     * Get the day's holidays.
     */
    private function holidays(string $format): array
    {
        $holidays = [];

        foreach (array_keys(HOLIDAYS) as $holiday) {
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
}
