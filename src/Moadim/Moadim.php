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
     * @return bool
     */
    public function getGalusMode($galus = null)
    {
        return $galus ?? $this->galus;
    }

    /**
     * Set to either Galus or Israel.
     *
     * @param  bool $galus
     * @return \Zman\Zman
     */
    public function setGalusMode($galus)
    {
        $this->galus = $galus;

        return $this;
    }
}
