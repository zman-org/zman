<?php

namespace Zman\Tefilos;

trait Hallel
{
    /**
     * Checks if the day has Hallel.
     */
    public function hasHallel(?bool $galus = null): bool
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
