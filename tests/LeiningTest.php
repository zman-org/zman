<?php

use Zmanim\Zman;

class LeiningTest extends PHPUnit_Framework_TestCase
{
    /** @test */
    public function there_is_leining_on_all_mondays()
    {
        $this->assertTrue(Zman::parse('November 7, 2016')->isLeining());
    }

    /** @test */
    public function there_is_leining_on_all_thursdays()
    {
        $this->assertTrue(Zman::parse('November 10, 2016')->isLeining());
    }

    /** @test */
    public function there_is_leining_on_all_shabbosim()
    {
        $this->assertTrue(Zman::parse('November 12, 2016')->isLeining());
    }

    /** @test */
    public function there_is_no_leining_on_regular_weekdays()
    {
        $this->assertFalse(Zman::parse('November 6, 2016')->isLeining());
        $this->assertFalse(Zman::parse('November 8, 2016')->isLeining());
        $this->assertFalse(Zman::parse('November 9, 2016')->isLeining());
        $this->assertFalse(Zman::parse('November 11, 2016')->isLeining());
    }
}
