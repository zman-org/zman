<?php

namespace Zman\Getters;

use Carbon\Carbon;

trait Getters
{
    use MDY;
    use Parsha;
    use Holidays;

    /**
     * Get the date of the next Shabbos.
     *
     * @return $this
     */
    public function comingShabbos()
    {
        return $this->dayOfWeek !== Carbon::SATURDAY
            ? (clone $this)->next('Saturday')
            : $this;
    }

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

            case 'parsha':
                return $this->parshasHashavuaEnglish();
            case 'parshaHebrew':
                return $this->parshasHashavuaHebrew();
            case 'parshaInIsrael':
                return $this->parshasHashavuaEnglish(false);
            case 'parshaInIsraelHebrew':
                return $this->parshasHashavuaHebrew(false);

            case 'holidays':
                return $this->holidaysEnglish();
            case 'holidaysHebrew':
                return $this->holidaysHebrew();

            default:
                return parent::__get($name);
        }
    }
}
