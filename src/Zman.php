<?php

namespace Zman;

use Carbon\Carbon;
use Zman\Moadim\Moadim;
use Zman\Formats\Formats;
use Zman\Getters\Getters;
use Zman\Setters\Setters;
use Zman\Tefilos\Tefilos;
use Zman\Helpers\LeapYears;
use Zman\Helpers\DaysOfTheWeek;

class Zman extends Carbon
{
    use Moadim;
    use Formats;
    use Getters;
    use Setters;
    use Tefilos;
    use LeapYears;
    use DaysOfTheWeek;

    /**
     * The instance's jewish date.
     *
     * @var array
     */
    protected $jdate;

    /**
     * Global flag for Galus Mode.
     *
     * @var bool
     */
    protected $galus = true;

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

        list(
            $this->jdate['month'], $this->jdate['day'], $this->jdate['year']
        ) = explode('/', toJewish($this->month, $this->day, $this->year));
    }

    /**
     * Create a Carbon instance from a DateTime one.
     *
     * @param \DateTimeInterface $date
     *
     * @return static
     */
    public static function instance($date)
    {
        $instance = parent::instance($date);

        list(
            $instance->jdate['month'], $instance->jdate['day'], $instance->jdate['year']
        ) = explode('/', toJewish($instance->month, $instance->day, $instance->year));

        return $instance;
    }


    /**
     * Create a new instance from a Jewish date.
     *
     * @param  string|int $year
     * @param  string|int $month
     * @param  string|int $day
     * @return \Zman\Zman
     */
    public static function createFromJewishDate($year, $month, $day)
    {
        return toSecular($month, $day, $year);
    }

    /**
     * Create a new instance from a string of Jewish date.
     *
     * @param  string $str
     * @return \Zman\Zman
     */
    public static function createFromStringJewishDate($str)
    {
        $jewishDate = strToJewishDate($str);
        return toSecular(...$jewishDate);
    }
}