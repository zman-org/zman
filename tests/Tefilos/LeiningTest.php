<?php

namespace Test\Tefilos;

use Zman\Zman;

class LeiningTest extends \PHPUnit\Framework\TestCase
{
    /** @test */
    public function there_is_leining_at_shacharis_on_all_mondays()
    {
        $this->assertTrue(Zman::parse('November 7, 2016')->hasLeining());

        $this->assertTrue(Zman::parse('November 7, 2016')->hasLeining('shacharis'));
        $this->assertFalse(Zman::parse('November 7, 2016')->hasLeining('mincha'));
    }

    /** @test */
    public function leining_at_shacharis_on_a_regular_monday_is_the_coming_parsha()
    {
        $this->assertEquals('Lech Licha', Zman::parse('November 7, 2016')->leiningAt('shacharis'));
    }

    /** @test */
    public function there_is_leining_on_all_thursdays()
    {
        $this->assertTrue(Zman::parse('November 10, 2016')->hasLeining());
    }

    /** @test */
    public function leining_at_shacharis_on_a_regular_thursday_is_the_coming_parsha()
    {
        $this->assertEquals('Lech Licha', Zman::parse('November 10, 2016')->leiningAt('shacharis'));
    }

    /** @test */
    public function there_is_leining_on_all_shabbosim()
    {
        $this->assertTrue(Zman::parse('November 12, 2016')->hasLeining());
    }

    /** @test */
    public function leining_at_shacharis_on_a_regular_shabbos_is_the_weeks_parsha()
    {
        $this->assertEquals('Lech Licha', Zman::parse('November 12, 2016')->leiningAt('shacharis'));
    }

    /** @test */
    public function leining_at_shacharis_on_a_shabbos_rosh_chodesh_is_the_weeks_parsha_and_rosh_chodesh()
    {
        $this->assertEquals('Vaeira & Rosh Chodesh', Zman::parse('January 28, 2017')->leiningAt('shacharis'));
    }

    /** @test */
    public function leining_at_mincha_on_a_regular_shabbos_is_the_next_weeks_parsha()
    {
        $this->assertEquals('Vayera', Zman::parse('November 12, 2016')->leiningAt('mincha'));
    }

    /** @test */
    public function there_is_leining_on_rosh_chodesh()
    {
        $this->assertTrue(Zman::parse('November 1, 2016')->hasLeining());
    }

    /** @test */
    public function leining_at_shacharis_on_any_rosh_chodesh_is_rosh_chodesh()
    {
        $this->assertEquals('Rosh Chodesh', Zman::parse('November 1, 2016')->leiningAt('shacharis'));
    }

    /** @test */
    public function there_is_leining_on_fast_days()
    {
        $this->assertTrue(Zman::parse('January 8, 2017')->hasLeining());
    }

    /** @test */
    public function leining_at_shacharis_on_a_fast_day_is_taanis_tzibbur()
    {
        $this->assertEquals('Taanis Tzibbur', Zman::parse('January 8, 2017')->leiningAt('shacharis'));
    }

    /** @test */
    public function leining_at_mincha_on_a_fast_day_is_taanis_tzibbur()
    {
        $this->assertEquals('Taanis Tzibbur', Zman::parse('January 8, 2017')->leiningAt('mincha'));
    }

    /** @test */
    public function there_is_leining_at_on_yuntif()
    {
        $this->assertTrue(Zman::parse('April 11, 2017')->hasLeining());
    }

    /** @test */
    public function leining_at_shacharis_on_yuntif_is_the_name_of_the_yuntif()
    {
        $this->assertEquals('Pesach', Zman::parse('April 11, 2017')->leiningAt('shacharis'));
        $this->assertEquals('Shavuos', Zman::parse('May 31, 2017')->leiningAt('shacharis'));
        $this->assertEquals('Sukkos', Zman::parse('October 17, 2016')->leiningAt('shacharis'));

        $this->assertEquals('Shmini Atzeres', Zman::parse('October 24, 2016')->leiningAt('shacharis'));
        $this->assertEquals('Simchas Torah', Zman::parse('October 25, 2016')->leiningAt('shacharis'));

        $this->assertEquals('Rosh Hashana', Zman::parse('October 3, 2016')->leiningAt('shacharis'));
        $this->assertEquals('Yom Kippur', Zman::parse('October 12, 2016')->leiningAt('shacharis'));
    }

    /** @test */
    public function leining_at_mincha_of_yom_kippur_is_yom_kippur()
    {
        $this->assertEquals('Yom Kippur', Zman::parse('October 12, 2016')->leiningAt('mincha'));
    }

    /** @test */
    public function there_is_leining_on_chol_hamoed()
    {
        $this->assertTrue(Zman::parse('April 14, 2017')->hasLeining());
    }

    /** @test */
    public function leining_at_shacharis_on_chol_hamoed_is_the_name_of_the_moed()
    {
        $this->assertEquals('Pesach', Zman::parse('April 13, 2017')->leiningAt('shacharis'));
        $this->assertEquals('Sukkos', Zman::parse('October 17, 2016')->leiningAt('shacharis'));
    }

    /** @test */
    public function there_is_leining_on_chanuka()
    {
        $this->assertTrue(Zman::parse('December 27, 2016')->hasLeining());
    }

    /** @test */
    public function leining_at_shacharis_on_chanuka_is_chanuka()
    {
        $this->assertEquals('Chanuka', Zman::parse('December 27, 2016')->leiningAt('shacharis'));
    }

    /** @test */
    public function leining_at_shacharis_on_rosh_chodesh_of_chanuka_is_rosh_chodesh_and_chanuka()
    {
        $this->assertEquals('Rosh Chodesh & Chanuka', Zman::parse('December 30, 2016')->leiningAt('shacharis'));
    }

    /** @test */
    public function there_is_leining_on_purim()
    {
        $this->assertTrue(Zman::parse('March 12, 2017')->hasLeining());
    }

    /** @test */
    public function leining_at_shacharis_on_purim_is_purim()
    {
        $this->assertEquals('Purim', Zman::parse('March 12, 2017')->leiningAt('shacharis'));
    }

    /** @test */
    public function there_is_no_leining_on_regular_weekdays()
    {
        $this->assertFalse(Zman::parse('November 6, 2016')->hasLeining());
        $this->assertFalse(Zman::parse('November 8, 2016')->hasLeining());
        $this->assertFalse(Zman::parse('November 9, 2016')->hasLeining());
        $this->assertFalse(Zman::parse('November 11, 2016')->hasLeining());
    }

    /** @test */
    public function leining_is_null_when_there_is_no_leining()
    {
        $this->assertNull(Zman::parse('November 6, 2016')->leiningAt('shacharis'));
    }
}
