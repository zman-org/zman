<?php

namespace Test\Moadim;

use Zman\Zman;

class CholHamoedTest extends \PHPUnit\Framework\TestCase
{
    /** @test */
    public function checks_if_it_is_chol_hamoed()
    {
        $this->assertTrue(Zman::parse('April 13, 2017')->isCholHamoed());
        $this->assertTrue(Zman::parse('October 19, 2016')->isCholHamoed());

        $this->assertFalse(Zman::parse('October 24, 2016')->isCholHamoed());
    }

    /** @test */
    public function checks_if_it_is_chol_hamoed_pesach()
    {
        $this->assertTrue(Zman::parse('April 12, 2017')->isCholHamoedPesach(false)); // For E"Y
        $this->assertTrue(Zman::parse('April 13, 2017')->isCholHamoedPesach());
        $this->assertTrue(Zman::parse('April 14, 2017')->isCholHamoedPesach());
        $this->assertTrue(Zman::parse('April 15, 2017')->isCholHamoedPesach());
        $this->assertTrue(Zman::parse('April 16, 2017')->isCholHamoedPesach());

        $this->assertFalse(Zman::parse('April 12, 2017')->isCholHamoedPesach());
        $this->assertFalse(Zman::parse('April 17, 2017')->isCholHamoedPesach());
    }

    /** @test */
    public function checks_if_it_is_chol_hamoed_sukkos()
    {
        $this->assertTrue(Zman::parse('October 18, 2016')->isCholHamoedSukkos(false)); // For E"Y
        $this->assertTrue(Zman::parse('October 19, 2016')->isCholHamoedSukkos());
        $this->assertTrue(Zman::parse('October 20, 2016')->isCholHamoedSukkos());
        $this->assertTrue(Zman::parse('October 21, 2016')->isCholHamoedSukkos());
        $this->assertTrue(Zman::parse('October 22, 2016')->isCholHamoedSukkos());
        $this->assertTrue(Zman::parse('October 23, 2016')->isCholHamoedSukkos());

        $this->assertFalse(Zman::parse('October 24, 2016')->isCholHamoedSukkos());
    }
}
