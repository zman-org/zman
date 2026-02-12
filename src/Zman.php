<?php

namespace Zman;

use Carbon\Carbon;
use Carbon\Month;
use Carbon\WeekDay;
use DateTimeInterface;
use DateTimeZone;
use Zman\Formats\Formats;
use Zman\Getters\Getters;
use Zman\Helpers\DaysOfTheWeek;
use Zman\Helpers\LeapYears;
use Zman\Moadim\Moadim;
use Zman\Setters\Setters;
use Zman\Tefilos\Tefilos;

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
     */
    protected array $jdate = [];

    /**
     * Global flag for Galus Mode.
     */
    protected bool $galus = true;

    /**
     * Zman inherits from Carbon which in turn
     * inherits from \DateTime. This allows
     * us access to tons of nifty stuff.
     */
    public function __construct(
        DateTimeInterface|WeekDay|Month|string|int|float|null $time = null,
        DateTimeZone|string|int|null $timezone = null,
        /** @deprecated */
        DateTimeZone|string|int|null $tz = null,
    ){
        // Backward compatibility for tz parameter, Carbon names it "timezone"
        if (!$timezone && $tz) {
            $timezone = $tz;
        }

        parent::__construct($time, $timezone);

        list(
            $this->jdate['month'], $this->jdate['day'], $this->jdate['year']
        ) = explode('/', toJewish($this->month, $this->day, $this->year));
    }

    /**
     * Create a Carbon instance from a DateTime one.
     */
    public static function instance(DateTimeInterface $date): static
    {
        $instance = parent::instance($date);

        list(
            $instance->jdate['month'], $instance->jdate['day'], $instance->jdate['year']
        ) = explode('/', toJewish($instance->month, $instance->day, $instance->year));

        return $instance;
    }


    /**
     * Create a new instance from a Jewish date.
     */
    public static function createFromJewishDate(int $year, int $month, int $day): static
    {
        return toSecular($month, $day, $year);
    }
}
