<?php

use Zman\Zman;

class MDYTest extends PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_gets_the_day_of_the_month()
    {
        $zman = Zman::parse('February 27, 2017');

        $this->assertEquals(27, $zman->day);
        $this->assertEquals(1, $zman->jewishDay);
    }

    /** @test */
    public function it_gets_the_day_of_the_month_in_hebrew()
    {
        $zman = Zman::parse('February 27, 2017');

        $this->assertEquals(27, $zman->day);
        $this->assertEquals('א׳', $zman->jewishDayHebrew);
    }

    /** @test */
    public function it_gets_the_month_number()
    {
        $zman = Zman::parse('February 27, 2017');

        $this->assertEquals(2, $zman->month);
        $this->assertEquals(7, $zman->jewishMonth);
    }

    /** @test */
    public function it_gets_the_year()
    {
        $zman = Zman::parse('February 27, 2017');

        $this->assertEquals(2017, $zman->year);
        $this->assertEquals(5777, $zman->jewishYear);
    }

    /** @test */
    public function it_gets_the_year_in_hebrew()
    {
        $zman = Zman::parse('February 27, 2017');

        $this->assertEquals(2017, $zman->year);
        $this->assertEquals('תשע״ז', $zman->jewishYearHebrew);
    }

    /** @test */
    public function it_gets_the_month_name_in_english()
    {
        $this->assertEquals('Nissan', Zman::parse('April 2, 2017')->jewishMonthName);
    }

    /** @test */
    public function it_gets_the_month_name_in_hebrew()
    {
        $this->assertEquals('ניסן', Zman::parse('April 2, 2017')->jewishMonthNameHebrew);
    }

    /** @test */
    public function it_gets_adar_as_the_month_if_it_is_not_a_leap_year()
    {
        $this->assertEquals('Adar', Zman::parse('February 27, 2017')->jewishMonthName);
    }

    /** @test */
    public function it_gets_adar_1_and_adar_2_as_the_months_if_it_is_a_leap_year()
    {
        $this->assertEquals('Adar 1', Zman::parse('February 27, 2019')->jewishMonthName);
        $this->assertEquals('Adar 2', Zman::parse('March 27, 2019')->jewishMonthName);
    }
}
