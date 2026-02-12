<?php

namespace Zman\Moadim;

trait AseresYimeiTeshuva
{
    /**
     * The Aseres Yimei Teshuva are always from the
     * first of Tishrei to the tenth of Tishrei.
     */
    public function isAseresYimeiTeshuva(): bool
    {
        return $this->jewishMonth === 1 && $this->jewishDay >= 1 && $this->jewishDay <= 10;
    }
}
