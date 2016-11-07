<?php

namespace Zmanim\Moadim;

trait AseresYimeiTeshuva
{
    /**
     * The Aseres Yimei Teshuva are always from the
     * first of Tishrei to the tenth of Tishrei.
     *
     * @return bool
     */
    public function isAseresYimeiTeshuva()
    {
        return $this->month === 1 && $this->day >= 1 && $this->day <= 10;
    }
}
