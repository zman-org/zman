<?php

use Zman\Zman;

class InstantiationTest extends PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_can_be_newed_up()
    {
        $zman = new Zman('first day of November 2016');
        $this->assertInstanceOf(Zman::class, $zman);
    }

    /** @test */
    public function it_can_instantiated_by_parsing_a_string()
    {
        $zman = Zman::parse('first day of November 2016');
        $this->assertInstanceOf(Zman::class, $zman);
    }

    /** @test */
    public function it_can_be_instantiated_with_the_current_moment()
    {
        $zman = Zman::now();
        $this->assertInstanceOf(Zman::class, $zman);
    }

    /** @test */
    public function it_can_be_instantiated_manually_with_an_english_date()
    {
        $zman = Zman::createFromDate(2016, 2, 2);

        $this->assertInstanceOf(Zman::class, $zman);
        $this->assertEquals('Feb 2, 2016', $zman->toFormattedDateString());
    }

    /** @test */
    public function it_can_be_instantiated_manually_with_a_jewish_date()
    {
        $zman = Zman::createFromJewishDate(5776, 5, 23);

        $this->assertInstanceOf(Zman::class, $zman);
        $this->assertEquals('Feb 2, 2016', $zman->toFormattedDateString());
        $this->assertEquals('כ״ג שבט, תשע״ו', $zman->toFormattedJewishHebrewDateString());
    }
}
