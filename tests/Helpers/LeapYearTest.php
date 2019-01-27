<?php

namespace Test\Helpers;

use Zman\Zman;

class LeapYearTest extends \PHPUnit\Framework\TestCase
{
    /** @test */
    public function checks_if_the_date_is_part_of_a_leap_year()
    {
        $this->assertFalse(Zman::createFromDate(2017, 1, 1)->isJewishLeapYear());
        $this->assertTrue(Zman::createFromDate(2019, 1, 1)->isJewishLeapYear());
    }
}
