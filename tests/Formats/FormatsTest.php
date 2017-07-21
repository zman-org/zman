<?php

use Zman\Zman;

class FormatsTest extends \PHPUnit\Framework\TestCase
{
    /** @test */
    public function it_prints_the_jewish_date_as_a_string()
    {
        $this->assertEquals('5777-1-2', Zman::parse('10/4/2016')->toJewishDateString());
    }

    /** @test */
    public function it_prints_the_full_jewish_date_in_english()
    {
        $this->assertEquals('1 Tishrei, 5777', Zman::parse('10/3/2016')->toFormattedJewishDateString());
    }

    /** @test */
    public function it_prints_the_full_jewish_date_in_hebrew()
    {
        $this->assertEquals('א׳ תשרי, תשע״ז', Zman::parse('10/3/2016')->toFormattedJewishHebrewDateString());
    }

    /** @test */
    public function it_prints_the_jewish_date_as_a_string_with_the_time()
    {
        $this->assertEquals('5777-1-2 14:15:16', Zman::parse('2016-10-4 14:15:16')->toJewishDateTimeString());
    }
}
