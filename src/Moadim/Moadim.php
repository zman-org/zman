<?php

namespace Zman\Moadim;

trait Moadim
{
    use Yuntif;
    use FastDays;
    use Holidays;
    use CholHamoed;
    use RoshChodesh;
    use AseresYimeiTeshuva;
    use Omer;

    /**
     * Get if we're set to Galus or Israel.
     *
     * @param  bool $galus We can manually choose to override the setting for
     * this function call
     */
    public function getGalusMode(?bool $galus = null): bool
    {
        return $galus ?? $this->galus;
    }

    /**
     * Set to either Galus or Israel.
     */
    public function setGalusMode(bool $galus): static
    {
        $this->galus = $galus;

        return $this;
    }
}
