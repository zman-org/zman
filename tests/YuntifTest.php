<?php

use Zmanim\Zman;

class YuntifTest extends PHPUnit_Framework_TestCase
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
    public function it_knows_if_a_day_is_any_yuntif()
    {
        $this->assertTrue(Zman::parse('April 11, 2017')->isYuntif());
        $this->assertTrue(Zman::parse('May 31, 2017')->isYuntif());
        $this->assertTrue(Zman::parse('October 17, 2016')->isYuntif());
        $this->assertTrue(Zman::parse('October 3, 2016')->isYuntif());
        $this->assertTrue(Zman::parse('October 12, 2016')->isYuntif());
        $this->assertTrue(Zman::parse('October 24, 2016')->isYuntif());
        $this->assertTrue(Zman::parse('October 25, 2016')->isYuntif());
        
        $this->assertFalse(Zman::parse('October 26, 2016')->isYuntif());
    }
}
