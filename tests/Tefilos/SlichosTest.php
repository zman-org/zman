<?php

use Zman\Zman;

class SlichosTest extends PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_gets_the_first_day_of_slichos_for_sfaradim()
    {
        $firstDay = Zman::firstDayOfSfardiSlichos('5776');

        $this->assertEquals(9, $firstDay->month);
        $this->assertEquals(4, $firstDay->day);
        $this->assertEquals(2016, $firstDay->year);
    }

    /** @test */
    public function it_gets_the_first_day_of_slichos_for_ashkenazim()
    {
        // Normal Year
        $firstDay = Zman::firstDayOfAshkenaziSlichos('5777');

        $this->assertEquals(9, $firstDay->month);
        $this->assertEquals(17, $firstDay->day);
        $this->assertEquals(2017, $firstDay->year);

        // Extended Year
        $firstDay = Zman::firstDayOfAshkenaziSlichos('5776');

        $this->assertEquals(9, $firstDay->month);
        $this->assertEquals(25, $firstDay->day);
        $this->assertEquals(2016, $firstDay->year);
    }

    /** @test */
    public function it_gets_the_first_day_of_slichos_for_either_ashkenazim_or_sfardim()
    {
        $this->assertEquals(Zman::firstDayOfSlichos('5777', true), Zman::firstDayOfSfardiSlichos('5777'));
        $this->assertEquals(Zman::firstDayOfSlichos('5777', false), Zman::firstDayOfAshkenaziSlichos('5777'));
    }

    /** @test */
    public function there_are_slichos_for_sfardim_throughout_elul()
    {
        $this->assertTrue(Zman::parse('September 11, 2017')->hasSlichos(true));
        $this->assertTrue(Zman::parse('September 17, 2017')->hasSlichos(true));

        $this->assertFalse(Zman::parse('December 11, 2017')->hasSlichos(true));
    }

    /** @test */
    public function there_are_slichos_during_the_week_preceding_rosh_hashana_of_at_least_4_or_more_days()
    {
        // Normal Year
        $this->assertTrue(Zman::parse('September 17, 2017')->hasSlichos());
        $this->assertFalse(Zman::parse('September 11, 2017')->hasSlichos());

        // Extended Year
        $this->assertTrue(Zman::parse('September 25, 2016')->hasSlichos());
    }

    /** @test */
    public function there_are_slichos_on_tzom_gedaliah()
    {
        $this->assertTrue(Zman::parse('October 5, 2016')->isTzomGedaliah());
        $this->assertTrue(Zman::parse('October 5, 2016')->hasSlichos());
    }

    /** @test */
    public function there_are_slichos_throughout_the_aseres_yimei_teshuva()
    {
        $this->assertTrue(Zman::parse('September 26, 2017')->hasSlichos());
    }

    /** @test */
    public function there_are_slichos_on_yom_kippur()
    {
        $this->assertTrue(Zman::parse('October 12, 2016')->isYomKippur());
        $this->assertTrue(Zman::parse('October 12, 2016')->hasSlichos());
    }

    /** @test */
    public function there_are_slichos_on_asara_biteives()
    {
        $this->assertTrue(Zman::parse('January 8, 2017')->isAsaraBiteives());
        $this->assertTrue(Zman::parse('January 8, 2017')->hasSlichos());
    }

    /** @test */
    public function there_are_slichos_on_taanis_esther()
    {
        $this->assertTrue(Zman::parse('February 28, 2018')->isTaanisEsther());
        $this->assertTrue(Zman::parse('February 28, 2018')->hasSlichos());
    }

    /** @test */
    public function there_are_slichos_on_shiva_asar_bitamuz()
    {
        $this->assertTrue(Zman::parse('July 11, 2017')->isShivaAsarBitamuz());
        $this->assertTrue(Zman::parse('July 11, 2017')->hasSlichos());
    }

    /** @test */
    public function there_are_no_slichos_on_tisha_bav()
    {
        $this->assertTrue(Zman::parse('August 1, 2017')->isTishaBav());
        $this->assertFalse(Zman::parse('August 1, 2017')->hasSlichos());
    }

    /** @test */
    public function there_are_no_slichos_on_shabbos_unless_it_is_yom_kippur()
    {
        $this->assertFalse(Zman::parse('September 23, 2017')->hasSlichos());
        $this->assertTrue(Zman::parse('September 30, 2017')->hasSlichos());
    }
}
