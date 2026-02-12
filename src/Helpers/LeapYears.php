<?php

namespace Zman\Helpers;

trait LeapYears
{
    /**
     * Checks if the Jewish year is meubar.
     */
    public function isJewishLeapYear(): bool
    {
        return isJewishLeapYear($this->jewishYear);
    }
}
