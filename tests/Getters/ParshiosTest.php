<?php

use Zman\Zman;

class ParshiosTest extends PHPUnit_Framework_TestCase
{
    /** @test */
    public function the_first_week_after_simchas_torah_is_breishis()
    {
        $this->assertEquals('Breishis', Zman::parse('10/26/16')->parsha);
        $this->assertEquals('Breishis', Zman::parse('10/27/16')->parsha);
        $this->assertEquals('Breishis', Zman::parse('10/28/16')->parsha);
        $this->assertEquals('Breishis', Zman::parse('10/29/16')->parsha);

        $this->assertNotEquals('Breishis', Zman::parse('10/30/16')->parsha);
    }

    /** @test */
    public function until_vayakhel_the_parshios_go_in_order_after_breishis()
    {
        $this->assertEquals('Noach', Zman::parse('10/30/16')->parsha);
        $this->assertEquals('Noach', Zman::parse('11/2/16')->parsha);

        $this->assertEquals('Lech Licha', Zman::parse('11/7/16')->parsha);
        $this->assertEquals('Lech Licha', Zman::parse('11/9/16')->parsha);

        // $this->assertEquals('Shmos', Zman::parse('1/17/17')->parsha);
        // $this->assertEquals('Mishpatim', Zman::parse('2/22/17')->parsha);
    }

    /** @test */
    public function gets_the_parshas_hashavua_in_English()
    {
        // $this->assertEquals('Vayera', Zman::parse('11/14/16')->parsha);
    }
}
