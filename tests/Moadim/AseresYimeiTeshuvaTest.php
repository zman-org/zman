<?php

use Zman\Zman;

class AseresYimeiTeshuvaTest extends PHPUnit_Framework_TestCase
{
    /** @test */
    public function checks_if_it_is_the_aseres_yimei_teshuva()
    {
        $this->assertTrue(Zman::parse('September 21, 2017')->isAseresYimeiTeshuva());
        $this->assertTrue(Zman::parse('September 22, 2017')->isAseresYimeiTeshuva());
        $this->assertTrue(Zman::parse('September 23, 2017')->isAseresYimeiTeshuva());
        $this->assertTrue(Zman::parse('September 24, 2017')->isAseresYimeiTeshuva());
        $this->assertTrue(Zman::parse('September 25, 2017')->isAseresYimeiTeshuva());
        $this->assertTrue(Zman::parse('September 26, 2017')->isAseresYimeiTeshuva());
        $this->assertTrue(Zman::parse('September 27, 2017')->isAseresYimeiTeshuva());
        $this->assertTrue(Zman::parse('September 28, 2017')->isAseresYimeiTeshuva());
        $this->assertTrue(Zman::parse('September 29, 2017')->isAseresYimeiTeshuva());
        $this->assertTrue(Zman::parse('September 30, 2017')->isAseresYimeiTeshuva());

        $this->assertFalse(Zman::parse('October 23, 2017')->isAseresYimeiTeshuva());
    }
}
