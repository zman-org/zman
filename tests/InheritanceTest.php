<?php

use Zman\Zman;

class InheritanceTest extends PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_inherits_some_getters_from_Carbon()
    {
        $zman = new Zman('first day of November 2016');

        $this->assertEquals(2, $zman->dayOfWeek);
    }

    /** @test */
    public function it_inherits_modifiers_for_days_and_handles_them_properly()
    {
        $zman = new Zman('November 12, 2016');
        $this->assertTrue($zman->isShabbos());

        $zman = $zman->addDay(1);

        $this->assertFalse($zman->isShabbos());

        $this->assertTrue($zman->subDays(2)->isFriday());
    }

    /** @test */
    public function it_inherits_comparisons_from_Carbon()
    {
        $this->assertTrue(Zman::parse('November 12, 2016')->gt(Zman::parse('November 11, 2016')));
        $this->assertTrue(Zman::parse('November 12, 2016')->lt(Zman::parse('November 13, 2016')));
        $this->assertFalse(Zman::parse('November 12, 2016')->lt(Zman::parse('November 11, 2016')));
    }

    /** @test */
    public function it_inherits_difference_methods_from_Carbon()
    {
        $this->assertEquals(2, Zman::parse('November 12, 2016')->diffInDays(Zman::parse('November 14, 2016')));
    }
}
