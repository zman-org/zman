<?php

namespace Zman\Helpers;

trait LeapYears
{
    /**
     * Checks if the Jewish year is meubar.
     *
     * @return bool
     */
    public function isJewishLeapYear()
    {
        return isJewishLeapYear($this->jewishYear);
    }
}
