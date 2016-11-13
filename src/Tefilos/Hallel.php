<?php

namespace Zman\Tefilos;

trait Hallel
{
    /**
     * Checks if the day has Hallel.
     *
     * @return bool
     */
    public function hasHallel($galus = true)
    {
        return $this->isPesach($galus)
            || $this->isShavuos($galus)
            || $this->isSukkos()
            || $this->isShminiAtzeres()
            || $this->isSimchasTorah($galus)
            || $this->isChanuka()
            || $this->isRoshChodesh();
    }
}
