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

    /**
     * Get if we're set to Galus or Israel.
     *
     * @return array
     */
    public function getGalus()
    {
        return $this->galus;
    }

    /**
     * Set to either Galus or Israel.
     *
     * @return array
     */
    public function setGalus($galus)
    {
        $this->galus = $galus;

        return $this;
    }
}
