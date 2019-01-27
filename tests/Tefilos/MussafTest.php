<?php

namespace Test\Tefilos;

use Zman\Zman;

class MussafTest extends \PHPUnit\Framework\TestCase
{
    /** @test */
    public function there_is_mussaf_on_rosh_chodesh()
    {
        $this->assertTrue(Zman::parse('November 1, 2016')->isRoshChodesh());
        $this->assertTrue(Zman::parse('November 1, 2016')->hasMussaf());
    }

    /** @test */
    public function there_is_mussaf_on_all_days_of_yuntif()
    {
        $this->assertTrue(Zman::parse('April 11, 2017')->isYuntif());
        $this->assertTrue(Zman::parse('April 11, 2017')->hasMussaf());
    }

    /** @test */
    public function there_is_mussaf_on_all_days_of_chol_hamoed()
    {
        $this->assertTrue(Zman::parse('April 13, 2017')->isCholHamoed());
        $this->assertTrue(Zman::parse('April 13, 2017')->hasMussaf());
    }

    /** @test */
    public function there_is_no_mussaf_on_chanuka()
    {
        $this->assertTrue(Zman::parse('December 20, 2017')->isChanuka());
        $this->assertFalse(Zman::parse('December 20, 2017')->hasMussaf());
    }
}
