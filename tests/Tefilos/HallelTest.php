<?php

use Zman\Zman;

class HallelTest extends \PHPUnit\Framework\TestCase
{
    /** @test */
    public function there_is_hallel_on_pesach()
    {
        // Galus
        $this->assertTrue(Zman::parse('April 18, 2017')->isPesach());
        $this->assertTrue(Zman::parse('April 18, 2017')->hasHallel());

        // E"Y
        $this->assertFalse(Zman::parse('April 18, 2017')->isPesach(false));
        $this->assertFalse(Zman::parse('April 18, 2017')->hasHallel(false));
    }

    /** @test */
    public function there_is_hallel_on_shavuos()
    {
        // Galus
        $this->assertTrue(Zman::parse('June 1, 2017')->isShavuos());
        $this->assertTrue(Zman::parse('June 1, 2017')->hasHallel());

        // E"Y
        $this->assertFalse(Zman::parse('June 1, 2017')->isShavuos(false));
        $this->assertFalse(Zman::parse('June 1, 2017')->hasHallel(false));
    }

    /** @test */
    public function there_is_hallel_on_sukkos()
    {
        $this->assertTrue(Zman::parse('October 23, 2016')->isSukkos());
        $this->assertTrue(Zman::parse('October 23, 2016')->hasHallel());
    }

    /** @test */
    public function there_is_hallel_on_shmini_atzeres()
    {
        $this->assertTrue(Zman::parse('October 24, 2016')->isShminiAtzeres());
        $this->assertTrue(Zman::parse('October 24, 2016')->hasHallel());
    }

    /** @test */
    public function there_is_hallel_on_simchas_torah()
    {
        // Galus
        $this->assertTrue(Zman::parse('October 25, 2016')->isSimchasTorah());
        $this->assertTrue(Zman::parse('October 25, 2016')->hasHallel());

        // E"Y
        $this->assertFalse(Zman::parse('October 25, 2016')->isSimchasTorah(false));
        $this->assertFalse(Zman::parse('October 25, 2016')->hasHallel(false));
    }

    /** @test */
    public function there_is_hallel_on_chanuka()
    {
        $this->assertTrue(Zman::parse('January 1, 2017')->isChanuka());
        $this->assertTrue(Zman::parse('January 1, 2017')->hasHallel());
    }

    /** @test */
    public function there_is_hallel_on_rosh_chodesh()
    {
        $this->assertTrue(Zman::parse('November 1, 2016')->isRoshChodesh());
        $this->assertTrue(Zman::parse('November 1, 2016')->hasHallel());
    }
}
