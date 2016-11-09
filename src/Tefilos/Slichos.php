<?php

namespace Zmanim\Tefilos;

trait Slichos
{
    /**
     * Checks if the day has Slichos.
     *
     * @return bool
     */
    public function hasSlichos($sfardi = false)
    {
        return ! ($this->isShabbos() && !$this->isYomKippur())
            && ($this->isAseresYimeiTeshuva()
            || $this->isElulSlichos($sfardi)
            || ($this->isFastDay() && ! $this->isTishaBav()));
    }

    /**
     * Checks if there are Slichos because of Elul.
     *
     * @param  bool $sfardi
     * @return bool
     */
    public function isElulSlichos($sfardi = false)
    {
        return $this->jewishMonth === 13 && $this->gte(static::firstDayOfSlichos($this->jewishYear, $sfardi));
    }

    /**
     * Gets the first day of Slichos before the Yomim Noraim.
     *
     * @param  bool   $sfardi
     * @return Carbon\Carbon
     */
    public static function firstDayOfSlichos($year, $sfardi = false)
    {
        return ! $sfardi ? static::firstDayOfAshkenaziSlichos($year) : static::firstDayOfSfardiSlichos($year);
    }

    /**
     * Gets the first day of Slichos for Sfaradim.
     *
     * @param  bool   $sfardi
     * @return Carbon\Carbon
     */
    public static function firstDayOfSfardiSlichos($year)
    {
        return toSecular(13, 1, $year);
    }

    /**
     * Gets the first day of Slichos for Ashkenazim.
     *
     * @param  bool   $sfardi
     * @return Carbon\Carbon
     */
    public static function firstDayOfAshkenaziSlichos($year)
    {
        $dayOfRoshHashana = static::firstDayOfRoshHashana($year + 1);

        return $dayOfRoshHashana
            ->subDays($dayOfRoshHashana->dayOfWeek + ($dayOfRoshHashana->dayOfWeek > 3 ? 0 : 7));
    }
}
