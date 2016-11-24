<?php

namespace Zman\Getters;

trait Parsha
{
    /**
     * Get the parsha in this format.
     *
     * @var string
     */
    protected $format;

    /**
     * Get the parshas hashavua in English.
     *
     * @param  bool   $galus
     * @return string
     */
    public function parshasHashavuaEnglish($galus = true)
    {
        $this->format = 'english';

        return $this->parshasHashavua($galus);
    }

    /**
     * Look up the parsha by its index.
     *
     * @param  int  $index
     * @return string
     */
    private function parshios($index)
    {
        return PARSHIOS[$index][$this->format];
    }

    /**
     * Get the current week's Parsha.
     *
     * @return string
     */
    private function parshasHashavua($galus = true)
    {
        // Breishis is the first Shabbos after Simchas Torah
        $simchasTorah = static::dayOfSimchasTorah($this->jewishYear, $galus);
        $shabbosBereishis = static::dayOfSimchasTorah($this->jewishYear, $galus)->addDays(6 - $simchasTorah->dayOfWeek);
        if ($this->between($simchasTorah, $shabbosBereishis)) {
            return $this->parshios(0);
        }

        // Until Adar everything goes in order
        // If it is a regular year the 4 are doubled
        $offset = 0;
        $shabbos = $this->diffInWeeks($shabbosBereishis->addDay()) + 1;

        $p = static::firstDayOfPesach($this->jewishYear);
        if ($this->gt($p)) {
            // if last day of pesach is shabbos we lose a second parsha in galus
            $offset -= $galus && $p->addDays(7)->isShabbos() ? 2 : 1;
        }

        if (!$this->isJewishLeapYear()) {
            $offset += $shabbos > 21 ? 1 : 0;
            $offset += $shabbos >= 27 ? 1 : 0;
            $offset += $shabbos >= 28 ? 1 : 0;
            $offset += $shabbos > 29 ? 1 : 0;

            if ($shabbos === 21 || $shabbos === 26 || $shabbos === 27 || $shabbos === 29) {
                return $this->parshios($shabbos + $offset).' - '.$this->parshios($shabbos + $offset + 1);
            }
        }

        // if second day shavuos is shabbos then we read chukas and balak together
        if ($galus && static::firstDayOfShavuos($this->jewishYear)->dayOfWeek === 5) {
            $offset -= $this->gt(static::firstDayOfShavuos($this->jewishYear)->addDay()) ? 1 : 0;
            $offset += $shabbos > 36 ? 1 : 0;

            if ($shabbos === 36) {
                return $this->parshios($shabbos + $offset).' - '.$this->parshios($shabbos + $offset + 1);
            }
        }

        // matos masei are together unless a leap year started on thursday
        // or in israel in a leap year where the last day of pesach was shabbos in galus
        $together = !($this->isJewishLeapYear() && static::firstDayOfRoshHashana($this->jewishYear)->isThursday());
        $together = (!$galus && $this->isJewishLeapYear() && $p->isShabbos()) ? false : $together;

        if ($together) {
            if ($this->parshios($shabbos + $offset) === 'Matos') {
                return $this->parshios($shabbos + $offset).' - '.$this->parshios($shabbos + $offset + 1);
            }
            $offset += $shabbos + $offset > 40 ? 1 : 0;
        }

        // netzavim and vayelech are together unless there are two shabbosim between R"H and sukkos
        $isBetweenRHAndSukkos = $this->between(static::firstDayOfRoshHashana($this->jewishYear), static::firstDayOfSukkos($this->jewishYear));

        $j = $isBetweenRHAndSukkos ? 0 : 1;

        $rh = static::firstDayOfRoshHashana($this->jewishYear + $j);
        $su = static::firstDayOfSukkos($this->jewishYear + $j);
        $count = 0;

        $day = $rh;
        while ($day->lt($su)) {
            $day->addDay();
            $count += $day->isShabbos() && !$day->isYomKippur() ? 1 : 0;
        }

        if ($count < 2 && $this->parshios($shabbos + $offset) === 'Nitzavim') {
            return $this->parshios($shabbos + $offset).' - '.$this->parshios($shabbos + $offset + 1);
        }

        if ($isBetweenRHAndSukkos) {
            if ($count < 2) {
                return $this->parshios(52);
            }

            return $this->lt(static::dayOfYomKippur($this->jewishYear + 1)) ? $this->parshios(51) : $this->parshios(52);
        }

        return $this->parshios($shabbos + $offset);
    }
}
