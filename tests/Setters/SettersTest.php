<?php

use Zman\Zman;

class Setters extends \PHPUnit\Framework\TestCase
{
    /** @test */
    public function it_sets_jewish_days_via_magic_setters()
    {
        $zman = new Zman('November 7, 2016');
        $this->assertEquals(7, $zman->day);
        $this->assertEquals(6, $zman->jewishDay);

        $zman->jewishDay = 10;

        $this->assertEquals(10, $zman->jewishDay);
    }

    /** @test */
    public function it_sets_jewish_days_via_setters_methods()
    {
        $zman = new Zman('November 7, 2016');
        $this->assertEquals(7, $zman->day);
        $this->assertEquals(6, $zman->jewishDay);

        $zman->jewishDay(10);

        $this->assertEquals(10, $zman->jewishDay);
    }

    /** @test */
    public function it_sets_jewish_months_via_magic_setters()
    {
        $zman = new Zman('November 7, 2016');
        $this->assertEquals(11, $zman->month);
        $this->assertEquals(2, $zman->jewishMonth);

        $zman->jewishMonth = 10;

        $this->assertEquals(10, $zman->jewishMonth);
    }

    /** @test */
    public function it_sets_jewish_months_via_setters_methods()
    {
        $zman = new Zman('November 7, 2016');
        $this->assertEquals(11, $zman->month);
        $this->assertEquals(2, $zman->jewishMonth);

        $zman->jewishMonth(10);

        $this->assertEquals(10, $zman->jewishMonth);
    }

    /** @test */
    public function it_sets_jewish_years_via_magic_setters()
    {
        $zman = new Zman('November 7, 2016');
        $this->assertEquals(2016, $zman->year);
        $this->assertEquals(5777, $zman->jewishYear);

        $zman->jewishYear = 5000;

        $this->assertEquals(5000, $zman->jewishYear);
    }

    /** @test */
    public function it_sets_jewish_years_via_setters_methods()
    {
        $zman = new Zman('November 7, 2016');
        $this->assertEquals(2016, $zman->year);
        $this->assertEquals(5777, $zman->jewishYear);

        $zman->jewishYear(5000);

        $this->assertEquals(5000, $zman->jewishYear);
    }

    /** @test */
    public function it_still_inherits_setters_from_Carbon()
    {
        $zman = new Zman('November 7, 2016');
        $this->assertEquals(2016, $zman->year);

        $zman->year(5000);

        $this->assertEquals(5000, $zman->year);
    }
}
