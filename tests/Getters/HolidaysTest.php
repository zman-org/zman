<?php

namespace Test\Getters;

use Zman\Zman;

class HolidaysTest extends \PHPUnit\Framework\TestCase
{
    /** @test */
    public function it_gets_a_summary_of_the_days_holidays_in_english()
    {
        $zman = Zman::parse('April 11, 2017');

        $this->assertTrue($zman->isPesach());
        $this->assertEquals(['Pesach'], $zman->holidays);
    }

    /** @test */
    public function it_gets_a_summary_of_the_days_holidays_in_hebrew()
    {
        $zman = Zman::parse('April 11, 2017');

        $this->assertTrue($zman->isPesach());
        $this->assertEquals(['פסח'], $zman->holidaysHebrew);
    }

    /** @test */
    public function it_returns_multiple_entries_when_there_are_coinciding_holidays()
    {
        $zman = Zman::parse('December 30, 2016');

        $this->assertTrue($zman->isRoshChodesh());
        $this->assertTrue($zman->isChanuka());

        $this->assertEquals(['Rosh Chodesh', 'Chanuka'], $zman->holidays);
        $this->assertEquals(['ראש חודש', 'חנוכה'], $zman->holidaysHebrew);
    }

    /** @test */
    public function it_returns_empty_when_there_are_no_holidays()
    {
        $zman = Zman::parse('Jan 27, 2019');

        $this->assertEquals([], $zman->holidays);
        $this->assertEquals([], $zman->holidaysHebrew);
    }
}
