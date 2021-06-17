<?php

namespace Zman\Moadim;

trait Omer
{
    /**
     * The Omer goes from 1 to 49 from Pesach to Shavuos.
     *
     * @return bool
     */
    public function getOmerCount()
    {
    	if ($this->jewishMonth == 8 && $this->jewishDay >= 16) {
    		return $this->jewishDay - 15;
    	} else if ($this->jewishMonth == 9) {
    		return $this->jewishDay + 15;
    	} else if ($this->jewishMonth == 10 && $this->jewishDay <= 5) {
    		return $this->jewishDay + 44;
    	}

    	return 0;
    }
}
