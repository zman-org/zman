<?php

namespace Zman\Getters;

trait Parsha
{
    /**
     * Get the current week's Parsha in English.
     *
     * @return string
     */
    public function parshasHashavua($galus = true)
    {
        return $galus ? $this->parshasHashavuaGalus() : $this->parshasHashavuaIsrael();
    }

    private function parshasHashavuaGalus()
    {
        // Breishis is the first Shabbos after Simchas Torah
        $simchasTorah = static::dayOfSimchasTorah($this->jewishYear);
        $shabbosBereishis = $simchasTorah->addDays(6 - $simchasTorah->dayOfWeek);
        if ($this->between(static::dayOfSimchasTorah($this->jewishYear), $shabbosBereishis)) {
            return PARSHIOS[0];
        }

        // Until Adar everything goes in order
        if ($this->jewishMonth > 0 && $this->jewishMonth < 7) {
            return PARSHIOS[$this->diffInWeeks($simchasTorah) + 1];
        }

        // day of rosh hashana
        // is leap year
        // second day of shavuos
        // last day of pesach
        //
        // number of shabbosim between rosh hashana and sukkos -- day of rosh hashana
    }

        // the first shabbos after simchas torah is Breishis
        // then add one each week
        //
        // the following are together unless it is a leap year
        // vayakhel pekudei
        // tazria metzora
        // acharei mos kedoshim
        // behar bechukosai
        //
        //
        // if first day of shavuos is friday then in galus
        // we read chukas and balak together
        //
        // matos masei - together unless the year started on a thursday. Or in E"Y if last day of pesach was shabbos
        //
        // netzavim vayelech - together if there are two shabbosim between R"H and Sukkos
        //
        // haazinu - last shabbos before sukkos
        //
}
