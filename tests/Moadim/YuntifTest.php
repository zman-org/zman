<?php

use Zmanim\Zman;

class YuntifTest extends PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_knows_when_the_yuntif_of_pesach_is()
    {
        $this->assertTrue(Zman::parse('April 11, 2017')->isPesachYuntif());
        $this->assertTrue(Zman::parse('April 12, 2017')->isPesachYuntif());
        $this->assertFalse(Zman::parse('April 12, 2017')->isPesachYuntif(false));

        $this->assertFalse(Zman::parse('April 13, 2017')->isPesachYuntif());
        $this->assertFalse(Zman::parse('April 14, 2017')->isPesachYuntif());
        $this->assertFalse(Zman::parse('April 15, 2017')->isPesachYuntif());
        $this->assertFalse(Zman::parse('April 16, 2017')->isPesachYuntif());

        $this->assertTrue(Zman::parse('April 17, 2017')->isPesachYuntif());
        $this->assertTrue(Zman::parse('April 18, 2017')->isPesachYuntif());
        $this->assertFalse(Zman::parse('April 18, 2017')->isPesachYuntif(false)); // For E"Y

        $this->assertFalse(Zman::parse('April 19, 2017')->isPesachYuntif());
    }

    /** @test */
    public function all_of_shavuos_is_a_yuntif()
    {
        $this->assertTrue(Zman::parse('May 31, 2017')->isYuntif());
        $this->assertTrue(Zman::parse('June 1, 2017')->isYuntif(true));
        $this->assertFalse(Zman::parse('June 1, 2017')->isYuntif(false)); // For Israel

        $this->assertFalse(Zman::parse('June 2, 2017')->isYuntif());
    }

    /** @test */
    public function it_knows_when_the_yuntif_of_sukkos_is()
    {
        $this->assertTrue(Zman::parse('October 17, 2016')->isSukkosYuntif());
        $this->assertTrue(Zman::parse('October 18, 2016')->isSukkosYuntif());
        $this->assertFalse(Zman::parse('October 18, 2016')->isSukkosYuntif(false));

        $this->assertFalse(Zman::parse('October 19, 2016')->isSukkosYuntif());
        $this->assertFalse(Zman::parse('October 20, 2016')->isSukkosYuntif());
        $this->assertFalse(Zman::parse('October 21, 2016')->isSukkosYuntif());
        $this->assertFalse(Zman::parse('October 22, 2016')->isSukkosYuntif());
        $this->assertFalse(Zman::parse('October 23, 2016')->isSukkosYuntif());
        $this->assertFalse(Zman::parse('October 24, 2016')->isSukkosYuntif());
    }

    /** @test */
    public function all_of_rosh_hashana_is_a_yuntif()
    {
        $this->assertTrue(Zman::parse('October 3, 2016')->isYuntif());
        $this->assertTrue(Zman::parse('October 4, 2016')->isYuntif());
    }

    /** @test */
    public function yom_kippur_is_a_yuntif()
    {
        $this->assertTrue(Zman::parse('October 12, 2016')->isYuntif());
    }

    /** @test */
    public function shmini_atzeres_is_a_yuntif()
    {
        $this->assertTrue(Zman::parse('October 24, 2016')->isYuntif());
    }

    /** @test */
    public function simchas_torah_is_a_yuntif()
    {
        $this->assertTrue(Zman::parse('October 25, 2016')->isYuntif());
        $this->assertFalse(Zman::parse('October 25, 2016')->isYuntif(false));
    }
}
