<?php

namespace Zmanim;

use Carbon\Carbon;
use Zmanim\Moadim\Shabbos;
use Zmanim\Moadim\FastDays;
use Zmanim\Moadim\RoshChodesh;

class Zman extends Carbon
{
    use Shabbos;
    use FastDays;
    use RoshChodesh;

    protected $date;

    public function __construct($time = null, $tz = null)
    {
        parent::__construct($time, $tz);

        $carbon = Carbon::parse($time);
        $this->date = explode('/', jdtojewish(gregoriantojd($carbon->month, $carbon->day, $carbon->year)));
    }

    public function hasLeining()
    {
        return $this->dayOfWeek === 1
            || $this->dayOfWeek === 4
            || $this->dayOfWeek === 6
            || $this->isRoshChodesh()
            || $this->isFastDay();
            // || $this->isYuntif()
            // || $this->isCholHamoed()
            // || $this->isChanuka()
            // || $this->isPurim();
    }

    public function __get($name)
    {
        switch (true) {
            case $name === 'day':
                return (int) $this->date[1];
            case $name === 'month':
                return (int) $this->date[0];
            case $name === 'year':
                return (int) $this->date[2];
            default:
                return parent::__get($name);
        }
    }
}
