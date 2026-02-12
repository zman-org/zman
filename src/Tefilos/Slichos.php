<?php

namespace Zman\Tefilos;

use Zman\Zman;

trait Slichos
{
    /**
     * Checks if the day has Slichos.
     */
    public function hasSlichos(bool $sfardi = false): bool
    {
        return !($this->isShabbos() && !$this->isYomKippur())
            && ($this->isAseresYimeiTeshuva()
            || $this->isElulSlichos($sfardi)
            || ($this->isFastDay() && !$this->isTishaBav()));
    }

    /**
     * Checks if there are Slichos because of Elul.
     */
    public function isElulSlichos(bool $sfardi = false): bool
    {
        return $this->jewishMonth === 13 && $this->gte(static::firstDayOfSlichos($this->jewishYear, $sfardi));
    }

    /**
     * Gets the first day of Slichos before the Yomim Noraim.
     */
    public static function firstDayOfSlichos(int $year, bool $sfardi = false): Zman
    {
        return !$sfardi ? static::firstDayOfAshkenaziSlichos($year) : static::firstDayOfSfardiSlichos($year);
    }

    /**
     * Gets the first day of Slichos for Sfaradim.
     */
    public static function firstDayOfSfardiSlichos(int $year): Zman
    {
        return toSecular(13, 1, $year);
    }

    /**
     * Gets the first day of Slichos for Ashkenazim.
     */
    public static function firstDayOfAshkenaziSlichos(int $year): Zman
    {
        $dayOfRoshHashana = static::firstDayOfRoshHashana($year + 1);

        return $dayOfRoshHashana
            ->subDays($dayOfRoshHashana->dayOfWeek + ($dayOfRoshHashana->dayOfWeek > 3 ? 0 : 7));
    }
}
