<?php

namespace Zmanim\Moadim;

trait Shabbos
{
    /**
     * Baruch Hashem, Shabbos happens
     * every single Saturday!
     *
     * @return bool
     */
    public function isShabbos()
    {
        return $this->dayOfWeek === 6;
    }
}
