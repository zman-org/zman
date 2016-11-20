<?php

namespace Zman\Getters;

trait Parsha
{
    /**
     * Get the current week's Parsha.
     *
     * @return string
     */
    public function parshasHashavua($galus = true)
    {
        // Breishis is the first Shabbos after Simchas Torah
        $simchasTorah = static::dayOfSimchasTorah($this->jewishYear, $galus);
        $shabbosBereishis = static::dayOfSimchasTorah($this->jewishYear, $galus)->addDays(6 - $simchasTorah->dayOfWeek);
        if ($this->between($simchasTorah, $shabbosBereishis)) {
            return PARSHIOS[0];
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
                return PARSHIOS[$shabbos + $offset].' - '.PARSHIOS[$shabbos + $offset + 1];
            }
        }

        // if second day shavuos is shabbos then we read chukas and balak together
        if ($galus && static::firstDayOfShavuos($this->jewishYear)->dayOfWeek === 5) {
            $offset -= $this->gt(static::firstDayOfShavuos($this->jewishYear)->addDay()) ? 1 : 0;
            $offset += $shabbos > 36 ? 1 : 0;

            if ($shabbos === 36) {
                return PARSHIOS[$shabbos + $offset].' - '.PARSHIOS[$shabbos + $offset + 1];
            }
        }

        // matos masei are together unless a leap year started on thursday
        // or in israel in a leap year where the last day of pesach was shabbos in galus
        $together = !($this->isJewishLeapYear() && static::firstDayOfRoshHashana($this->jewishYear)->isThursday());
        $together = (!$galus && $this->isJewishLeapYear() && $p->isShabbos()) ? false : $together;

        if ($together) {
            if (PARSHIOS[$shabbos + $offset] === 'Matos') {
                return PARSHIOS[$shabbos + $offset].' - '.PARSHIOS[$shabbos + $offset + 1];
            }
            $offset += $shabbos + $offset > 40 ? 1 : 0;
        }

        // netzavim and vayelech are together unless there are two shabbosim between R"H and sukkos
        $isBetweenRHAndSukkos = $this->between(static::firstDayOfRoshHashana($this->jewishYear), static::firstDayOfSukkos($this->jewishYear));

        $j = $isBetweenRHAndSukkos ? 0 : 1;

        $rh = static::firstDayOfRoshHashana($this->jewishYear + $j);
        $su = static::firstDayOfSukkos($this->jewishYear + $j);
        $count = 0;

        while (($day = $rh->addDay())->lt($su)) {
            $count += $day->isShabbos() && !$day->isYomKippur() ? 1 : 0;
        }

        if ($count < 2 && PARSHIOS[$shabbos + $offset] === 'Nitzavim') {
            return PARSHIOS[$shabbos + $offset].' - '.PARSHIOS[$shabbos + $offset + 1];
        }

        if ($isBetweenRHAndSukkos) {
            if ($count < 2) {
                return PARSHIOS[52];
            }

            return $this->lt(static::dayOfYomKippur($this->jewishYear + 1)) ? PARSHIOS[51] : PARSHIOS[52];
        }

        return PARSHIOS[$shabbos + $offset];
    }
}
