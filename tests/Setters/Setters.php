<?php

use Zmanim\Zman;

class Setters extends PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_sets_days_via_magic_setters()
    {
        $zman = new Zman('November 7, 2016');
        $this->assertEquals(6, $zman->day);

        $zman->day = 10;

        $this->assertEquals(10, $zman->day);
    }

    /** @test */
    public function it_sets_days_via_setters_methods()
    {
        $zman = new Zman('November 7, 2016');
        $this->assertEquals(6, $zman->day);

        $zman->day(10);

        $this->assertEquals(10, $zman->day);
    }

    /** @test */
    public function it_sets_months_via_magic_setters()
    {
        $zman = new Zman('November 7, 2016');
        $this->assertEquals(2, $zman->month);

        $zman->month = 10;
        
        $this->assertEquals(10, $zman->month);
    }

    /** @test */
    public function it_sets_months_via_setters_methods()
    {
        $zman = new Zman('November 7, 2016');
        $this->assertEquals(2, $zman->month);

        $zman->month(10);

        $this->assertEquals(10, $zman->month);
    }

    /** @test */
    public function it_sets_years_via_magic_setters()
    {
        $zman = new Zman('November 7, 2016');
        $this->assertEquals(5777, $zman->year);

        $zman->year = 5000;
        
        $this->assertEquals(5000, $zman->year);
    }

    /** @test */
    public function it_sets_years_via_setters_methods()
    {
        $zman = new Zman('November 7, 2016');
        $this->assertEquals(5777, $zman->year);

        $zman->year(5000);

        $this->assertEquals(5000, $zman->year);
    }
}
