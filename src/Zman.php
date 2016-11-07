<?php

namespace Zmanim;

use Carbon\Carbon;
use Zmanim\Moadim\Moadim;
use Zmanim\Getters\Getters;
use Zmanim\Setters\Setters;
use Zmanim\Tefilos\Tefilos;
use Zmanim\Helpers\DaysOfTheWeek;

class Zman extends Carbon
{
    use Moadim;
    use Getters;
    use Setters;
    use Tefilos;
    use DaysOfTheWeek;

    protected $jdate;
    protected $carbon;

    /**
     * Zman inherits from Carbon which in turn
     * inherits from \DateTime. This allows
     * us access to tons of nifty stuff.
     *
     * @param string $time
     * @param string $tz
     */
    public function __construct($time = null, $tz = null)
    {
        parent::__construct($time, $tz);

        $this->carbon = Carbon::parse($time);
        list($this->jdate['month'], $this->jdate['day'], $this->jdate['year'])
            = explode('/', toJewish($this->carbon->month, $this->carbon->day, $this->carbon->year));
    }
}
