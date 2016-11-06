<?php

namespace Zmanim;

use Carbon\Carbon;
use Zmanim\Moadim\Yuntif;
use Zmanim\Moadim\Shabbos;
use Zmanim\Moadim\FastDays;
use Zmanim\Moadim\Holidays;
use Zmanim\Moadim\CholHamoed;
use Zmanim\Moadim\RoshChodesh;
use Zmanim\Helpers\DaysOfTheWeek;

class Zman extends Carbon
{
    use Yuntif;
    use Holidays;
    use FastDays;
    use CholHamoed;
    use RoshChodesh;
    use DaysOfTheWeek;

    protected $date;

    public function __construct($time = null, $tz = null)
    {
        parent::__construct($time, $tz);

        $carbon = Carbon::parse($time);
        $this->date = explode('/', jdtojewish(gregoriantojd($carbon->month, $carbon->day, $carbon->year)));
    }

    public function hasLeining()
    {
        return $this->isMonday()
            || $this->isThursday()
            || $this->isShabbos()
            || $this->isRoshChodesh()
            || $this->isFastDay()
            || $this->isYuntif()
            || $this->isCholHamoed();
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
