<?php

use Zmanim\Zman;

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
}
