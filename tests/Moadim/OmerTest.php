<?php

namespace Test\Moadim;

use PHPUnit\Framework\Attributes\Test;
use Zman\Zman;

class OmerTest extends \PHPUnit\Framework\TestCase
{
    #[Test]
    public function checks_omer_count()
    {
        $this->assertEquals(1, Zman::parse('March 29, 2021')->getOmerCount());
        $this->assertEquals(33, Zman::parse('April 30, 2021')->getOmerCount());
        $this->assertEquals(49, Zman::parse('May 16, 2021')->getOmerCount());

        $this->assertNull(Zman::parse('March 28, 2021')->getOmerCount());
        $this->assertNull(Zman::parse('May 17, 2021')->getOmerCount());
        $this->assertNull(Zman::parse('November 14, 2021')->getOmerCount());
    }
}
