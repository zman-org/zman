<?php

use Zmanim\Zman;

class HolidaysTest extends PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_knows_when_pesach_is()
    {
        $this->assertTrue(Zman::parse('April 11, 2017')->isPesach());
        $this->assertTrue(Zman::parse('April 12, 2017')->isPesach());
        $this->assertTrue(Zman::parse('April 13, 2017')->isPesach());
        $this->assertTrue(Zman::parse('April 14, 2017')->isPesach());
        $this->assertTrue(Zman::parse('April 15, 2017')->isPesach());
        $this->assertTrue(Zman::parse('April 16, 2017')->isPesach());
        $this->assertTrue(Zman::parse('April 17, 2017')->isPesach());
        $this->assertTrue(Zman::parse('April 18, 2017')->isPesach(true));
        $this->assertFalse(Zman::parse('April 18, 2017')->isPesach(false)); // For Israel

        $this->assertFalse(Zman::parse('April 19, 2017')->isPesach());
    }

    /** @test */
    public function it_knows_when_shavuos_is()
    {
        $this->assertTrue(Zman::parse('May 31, 2017')->isShavuos());
        $this->assertTrue(Zman::parse('June 1, 2017')->isShavuos(true));
        $this->assertFalse(Zman::parse('June 1, 2017')->isShavuos(false)); // For Israel

        $this->assertFalse(Zman::parse('June 2, 2017')->isShavuos());
    }

    /** @test */
    public function it_knows_when_sukkos_is()
    {
        $this->assertTrue(Zman::parse('October 17, 2016')->isSukkos());
        $this->assertTrue(Zman::parse('October 18, 2016')->isSukkos());
        $this->assertTrue(Zman::parse('October 19, 2016')->isSukkos());
        $this->assertTrue(Zman::parse('October 20, 2016')->isSukkos());
        $this->assertTrue(Zman::parse('October 21, 2016')->isSukkos());
        $this->assertTrue(Zman::parse('October 22, 2016')->isSukkos());
        $this->assertTrue(Zman::parse('October 23, 2016')->isSukkos());

        $this->assertFalse(Zman::parse('October 24, 2016')->isSukkos());
    }

    /** @test */
    public function it_knows_when_rosh_hashana_is()
    {
        $this->assertTrue(Zman::parse('October 3, 2016')->isRoshHashana());
        $this->assertTrue(Zman::parse('October 4, 2016')->isRoshHashana());
        
        $this->assertFalse(Zman::parse('October 5, 2016')->isRoshHashana());
    }

    /** @test */
    public function it_knows_when_yom_kippur_is()
    {
        $this->assertTrue(Zman::parse('October 12, 2016')->isYomKippur());
        $this->assertFalse(Zman::parse('October 6, 2016')->isYomKippur());
    }

    /** @test */
    public function it_knows_when_shmini_atzeres_is()
    {
        $this->assertTrue(Zman::parse('October 24, 2016')->isShminiAtzeres());
        $this->assertFalse(Zman::parse('October 25, 2016')->isShminiAtzeres());
    }

    /** @test */
    public function it_knows_when_simchas_torah_is()
    {
        $this->assertTrue(Zman::parse('October 25, 2016')->isSimchasTorah());
        $this->assertFalse(Zman::parse('October 25, 2016')->isSimchasTorah(false));

        $this->assertFalse(Zman::parse('October 24, 2016')->isSimchasTorah());
    }

    /** @test */
    public function it_knows_when_chanuka_is()
    {
        // When Kislev has 29 days
        $this->assertTrue(Zman::parse('December 25, 2016')->isChanuka());
        $this->assertTrue(Zman::parse('December 26, 2016')->isChanuka());
        $this->assertTrue(Zman::parse('December 27, 2016')->isChanuka());
        $this->assertTrue(Zman::parse('December 28, 2016')->isChanuka());
        $this->assertTrue(Zman::parse('December 29, 2016')->isChanuka());
        $this->assertTrue(Zman::parse('December 30, 2016')->isChanuka());
        $this->assertTrue(Zman::parse('December 31, 2016')->isChanuka());
        $this->assertTrue(Zman::parse('January 1, 2017')->isChanuka());

        $this->assertFalse(Zman::parse('December 24, 2016')->isChanuka());
        $this->assertFalse(Zman::parse('January 2, 2017')->isChanuka());

        // // When Kislev has 30 days
        $this->assertTrue(Zman::parse('December 13, 2017')->isChanuka());
        $this->assertTrue(Zman::parse('December 14, 2017')->isChanuka());
        $this->assertTrue(Zman::parse('December 15, 2017')->isChanuka());
        $this->assertTrue(Zman::parse('December 16, 2017')->isChanuka());
        $this->assertTrue(Zman::parse('December 17, 2017')->isChanuka());
        $this->assertTrue(Zman::parse('December 18, 2017')->isChanuka());
        $this->assertTrue(Zman::parse('December 19, 2017')->isChanuka());
        $this->assertTrue(Zman::parse('December 20, 2017')->isChanuka());

        $this->assertFalse(Zman::parse('December 12, 2017')->isChanuka());
        $this->assertFalse(Zman::parse('December 21, 2017')->isChanuka());
    }

    /** @test */
    public function it_knows_the_first_day_of_chanuka()
    {
        $chanuka = Zman::firstDayOfChanuka('5777');
        
        $this->assertEquals(12, $chanuka->month);
        $this->assertEquals(25, $chanuka->day);
        $this->assertEquals(2016, $chanuka->year);
    }

    // purim
    // tu bishvat

    /** @test */
    public function it_knows_if_a_day_is_any_holiday()
    {
        $this->assertTrue(Zman::parse('April 11, 2017')->isHoliday());
        $this->assertTrue(Zman::parse('May 31, 2017')->isHoliday());
        $this->assertTrue(Zman::parse('October 17, 2016')->isHoliday());
        $this->assertTrue(Zman::parse('October 3, 2016')->isHoliday());
        $this->assertTrue(Zman::parse('October 12, 2016')->isHoliday());
        $this->assertTrue(Zman::parse('October 24, 2016')->isHoliday());
        $this->assertTrue(Zman::parse('October 25, 2016')->isHoliday());
        
        $this->assertFalse(Zman::parse('October 26, 2016')->isHoliday());
    }
}
