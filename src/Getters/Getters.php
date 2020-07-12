<?php

namespace Zman\Getters;

trait Getters
{
    use MDY;
    use Parsha;
    use Holidays;

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
        switch ($name) {
            case 'jewishMonth':
                return (int) $this->jdate['month'];
            case 'jewishDay':
                return (int) $this->jdate['day'];
            case 'jewishYear':
                return (int) $this->jdate['year'];

            case 'jewishMonthName':
                return $this->jewishMonthNameEnglish($this->jewishMonth, $this->jewishYear);
            case 'jewishMonthNameHebrew':
                return $this->jewishMonthNameHebrew($this->jewishMonth, $this->jewishYear);
            case 'jewishDayHebrew':
                return $this->jewishDayHebrew($this->jewishDay);
            case 'jewishYearHebrew':
                return $this->jewishYearHebrew($this->jewishYear);

            case 'currentParsha':
                return $this->parshasHashavuaEnglish();
            case 'currentParshaHebrew':
                return $this->parshasHashavuaHebrew();
            case 'parsha':
                return $this->parshasHashavuaEnglish(true);
            case 'parshaHebrew':
                return $this->parshasHashavuaHebrew(true);
            case 'parshaInIsrael':
                return $this->parshasHashavuaEnglish(false);
            case 'parshaInIsraelHebrew':
                return $this->parshasHashavuaHebrew(false);

            case 'currentHolidays':
                return $thsi->holidaysEnglish();
            case 'currentHolidaysHebrew':
                return $thsi->holidaysHebrew();
            case 'holidays':
                return $this->holidaysEnglish(true);
            case 'holidaysHebrew':
                return $this->holidaysHebrew(true);
            case 'holidaysInIsrael':
                return $this->holidaysEnglish(false);
            case 'holidaysHebrewInIsrael':
                return $this->holidaysHebrew(false);

            default:
                return parent::__get($name);
        }
    }
}
