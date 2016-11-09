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
        return $this->jewishMonth === 1 && $this->jewishDay >= 1 && $this->jewishDay <= 10;
    }
}
