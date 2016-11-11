<?php

use Zmanim\Zman;

class RoshChodeshTest extends PHPUnit_Framework_TestCase
{
    /** @test */
    public function checks_if_it_is_rosh_chodesh()
    {
        $this->assertTrue(Zman::parse('November 1, 2016')->isRoshChodesh());
        $this->assertTrue(Zman::parse('November 2, 2016')->isRoshChodesh());
        $this->assertFalse(Zman::parse('November 3, 2016')->isRoshChodesh());
    }
}
