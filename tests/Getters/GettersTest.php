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

    /** @test */
    public function it_gets_the_month_name_in_english()
    {
        $this->assertEquals('Nissan', Zman::parse('April 2, 2017')->monthName);
    }

    /** @test */
    public function it_gets_adar_as_the_month_if_it_is_not_a_leap_year()
    {
        $this->assertEquals('Adar', Zman::parse('February 27, 2017')->monthName);
    }

    /** @test */
    public function it_gets_adar_1_and_adar_2_as_the_months_if_it_is_a_leap_year()
    {
        $this->assertEquals('Adar 1', Zman::parse('February 27, 2019')->monthName);
        $this->assertEquals('Adar 2', Zman::parse('March 27, 2019')->monthName);
    }
}
