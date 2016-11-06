<?php

use Zmanim\Zman;

class GettersTest extends PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_gets_the_day_of_the_month()
    {
        $zman = Zman::parse('February 27, 2017');

        $this->assertEquals(1, $zman->day);
    }

    /** @test */
    public function it_gets_the_month_number()
    {
        $zman = Zman::parse('February 27, 2017');

        $this->assertEquals(7, $zman->month);
    }

    /** @test */
    public function it_gets_the_year()
    {
        $zman = Zman::parse('February 27, 2017');

        $this->assertEquals(5777, $zman->year);
    }

    // need to convert name of month 7 to 6 if not leap year
}
