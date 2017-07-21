<?php

use Zman\Zman;

class MoadimTest extends \PHPUnit\Framework\TestCase
{
    /** @test */
    public function checks_if_it_is_a_fast_day()
    {
        $this->assertTrue(Zman::parse('October 5, 2016')->isFastDay());  // Tzom Gedalya
        $this->assertTrue(Zman::parse('October 12, 2016')->isFastDay()); // Yom Kippur
        $this->assertTrue(Zman::parse('January 8, 2017')->isFastDay());  // Asara B'teives
        $this->assertTrue(Zman::parse('March 9, 2017')->isFastDay());    // Ta'anis Esther
        $this->assertTrue(Zman::parse('July 11, 2017')->isFastDay());    // Shiva Asar B'tamuz
        $this->assertTrue(Zman::parse('August 1, 2017')->isFastDay());   // Tisha B'av

        $this->assertFalse(Zman::parse('October 6, 2016')->isFastDay());
    }

    /** @test */
    public function gets_the_day_of_yom_kippur()
    {
        $this->assertEquals('Oct 12, 2016', Zman::dayOfYomKippur(5777)->toFormattedDateString());
    }

    /** @test */
    public function checks_if_it_is_yom_kippur()
    {
        $this->assertTrue(Zman::parse('October 12, 2016')->isYomKippur());
        $this->assertFalse(Zman::parse('October 13, 2016')->isYomKippur());
    }

    /** @test */
    public function gets_the_day_of_tzom_gedaliah()
    {
        $this->assertEquals('Oct 5, 2016', Zman::dayOfTzomGedaliah(5777)->toFormattedDateString());
        $this->assertEquals('Sep 24, 2017', Zman::dayOfTzomGedaliah(5778)->toFormattedDateString());
    }

    /** @test */
    public function checks_if_it_is_tzom_gedaliah()
    {
        // Normal Year
        $this->assertTrue(Zman::parse('October 5, 2016')->isTzomGedaliah());
        $this->assertFalse(Zman::parse('October 6, 2016')->isTzomGedaliah());

        // Year of a Nidcheh
        $this->assertTrue(Zman::parse('September 24, 2017')->isTzomGedaliah());
        $this->assertFalse(Zman::parse('September 23, 2017')->isTzomGedaliah());
    }

    /** @test */
    public function gets_the_day_of_asara_biteives()
    {
        $this->assertEquals('Jan 8, 2017', Zman::dayOfAsaraBiteives(5777)->toFormattedDateString());
    }

    /** @test */
    public function checks_if_it_is_asara_biteives()
    {
        $this->assertTrue(Zman::parse('January 8, 2017')->isAsaraBiteives());
        $this->assertFalse(Zman::parse('January 9, 2017')->isAsaraBiteives());
    }

    /** @test */
    public function gets_the_day_of_taanis_esther()
    {
        $this->assertEquals('Mar 9, 2017', Zman::dayOfTaanisEsther(5777)->toFormattedDateString());
        $this->assertEquals('Feb 28, 2018', Zman::dayOfTaanisEsther(5778)->toFormattedDateString());
    }

    /** @test */
    public function checks_if_it_is_taanis_esther()
    {
        // Normal Year
        $this->assertTrue(Zman::parse('February 28, 2018')->isTaanisEsther());
        $this->assertFalse(Zman::parse('March 1, 2018')->isTaanisEsther());

        // Nidcheh Year
        $this->assertTrue(Zman::parse('March 9, 2017')->isTaanisEsther());
        $this->assertFalse(Zman::parse('March 11, 2017')->isTaanisEsther());
    }

    /** @test */
    public function gets_the_day_of_shiva_asar_bitamuz()
    {
        $this->assertEquals('Jul 11, 2017', Zman::dayOfShivaAsarBitamuz(5777)->toFormattedDateString());
        $this->assertEquals('Jul 1, 2018', Zman::dayOfShivaAsarBitamuz(5778)->toFormattedDateString());
    }

    /** @test */
    public function checks_if_it_is_shiva_asar_bitamuz()
    {
        // Normal Year
        $this->assertTrue(Zman::parse('July 11, 2017')->isShivaAsarBitamuz());
        $this->assertFalse(Zman::parse('July 12, 2017')->isShivaAsarBitamuz());

        // Nidcheh Year
        $this->assertTrue(Zman::parse('July 1, 2018')->isShivaAsarBitamuz());
        $this->assertFalse(Zman::parse('June 30, 2018')->isShivaAsarBitamuz());
    }

    /** @test */
    public function gets_the_day_of_tisha_bav()
    {
        $this->assertEquals('Aug 1, 2017', Zman::dayOfTishaBav(5777)->toFormattedDateString());
        $this->assertEquals('Jul 22, 2018', Zman::dayOfTishaBav(5778)->toFormattedDateString());
    }

    /** @test */
    public function checks_if_it_is_tisha_bav()
    {
        // Normal Year
        $this->assertTrue(Zman::parse('August 1, 2017')->isTishaBav());
        $this->assertFalse(Zman::parse('August 2, 2017')->isTishaBav());

        // Nidcheh Year
        $this->assertTrue(Zman::parse('July 22, 2018')->isTishaBav());
        $this->assertFalse(Zman::parse('July 21, 2018')->isTishaBav());
    }
}
