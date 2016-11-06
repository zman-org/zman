<?php

namespace Zmanim;

class Zman extends \Carbon\Carbon
{
    // {{ jdtojewish(gregoriantojd(2, 27, 2017)) }}
    public function isLeining()
    {
        return $this->dayOfWeek === 1
            || $this->dayOfWeek === 4
            || $this->dayOfWeek === 6;
            // || $this->isRoshChodesh()
            // || $this->isFastDay()
            // || $this->isYuntif()
            // || $this->isCholHamoed()
            // || $this->isChanuka()
            // || $this->isPurim();
    }
}
