<?php

namespace Zman\Getters;

trait Getters
{
    use MDY;
    use Parsha;

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
            case $name === 'jewishMonth':
                return (int) $this->jdate['month'];
            case $name === 'jewishDay':
                return (int) $this->jdate['day'];
            case $name === 'jewishYear':
                return (int) $this->jdate['year'];
            case $name === 'jewishMonthName':
                return $this->jewishMonthNameEnglish($this->jewishMonth, $this->jewishYear);
            case $name === 'jewishMonthNameHebrew':
                return $this->jewishMonthNameHebrew($this->jewishMonth, $this->jewishYear);
            case $name === 'jewishDayHebrew':
                return $this->jewishDayHebrew($this->jewishDay);
            case $name === 'jewishYearHebrew':
                return $this->jewishYearHebrew($this->jewishYear);
            case $name === 'parsha':
                return $this->parshasHashavua();
            case $name === 'parshaInIsrael':
                return $this->parshasHashavua(false);
            default:
                return parent::__get($name);
        }
    }
}
