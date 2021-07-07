<?php

namespace Test\Moadim;

use Zman\Zman;

class OmerTest extends \PHPUnit\Framework\TestCase
{
    /** @test */
    public function checks_omer_count()
    {
        $this->assertEquals(0, Zman::parse('March 28, 2021')->getOmerCount());
        $this->assertEquals(1, Zman::parse('March 29, 2021')->getOmerCount());
        $this->assertEquals(33, Zman::parse('April 30, 2021')->getOmerCount());
        $this->assertEquals(49, Zman::parse('May 16, 2021')->getOmerCount());
        $this->assertEquals(0, Zman::parse('May 17, 2021')->getOmerCount());
        $this->assertEquals(0, Zman::parse('November 14, 2021')->getOmerCount());
    }
}
