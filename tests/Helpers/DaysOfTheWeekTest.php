<?php

namespace Test\Helpers;

use PHPUnit\Framework\Attributes\Test;
use Zman\Zman;

class DaysOfTheWeekTest extends \PHPUnit\Framework\TestCase
{
    #[Test]
    public function sunday()
    {
        $this->assertTrue($zman = Zman::parse('January 1, 2017')->isSunday());
        $this->assertFalse($zman = Zman::parse('January 2, 2017')->isSunday());
    }

    #[Test]
    public function monday()
    {
        $this->assertTrue($zman = Zman::parse('January 2, 2017')->isMonday());
        $this->assertFalse($zman = Zman::parse('January 3, 2017')->isMonday());
    }

    #[Test]
    public function tuesday()
    {
        $this->assertTrue($zman = Zman::parse('January 3, 2017')->isTuesday());
        $this->assertFalse($zman = Zman::parse('January 4, 2017')->isTuesday());
    }

    #[Test]
    public function wednesday()
    {
        $this->assertTrue($zman = Zman::parse('January 4, 2017')->isWednesday());
        $this->assertFalse($zman = Zman::parse('January 5, 2017')->isWednesday());
    }

    #[Test]
    public function thursday()
    {
        $this->assertTrue($zman = Zman::parse('January 5, 2017')->isThursday());
        $this->assertFalse($zman = Zman::parse('January 6, 2017')->isThursday());
    }

    #[Test]
    public function friday()
    {
        $this->assertTrue($zman = Zman::parse('January 6, 2017')->isFriday());
        $this->assertFalse($zman = Zman::parse('January 7, 2017')->isFriday());
    }

    #[Test]
    public function shabbos()
    {
        $this->assertTrue($zman = Zman::parse('January 7, 2017')->isShabbos());
        $this->assertFalse($zman = Zman::parse('January 8, 2017')->isShabbos());
    }
}
