<?php

use Zman\Zman;
use Zman\Exceptions\InvalidDateException;

class HolidaysTest extends PHPUnit_Framework_TestCase
{
    /** @test */
    public function gets_the_first_day_of_pesach()
    {
        $this->assertEquals(11, Zman::firstDayOfPesach('5777')->day);
        $this->assertEquals(4, Zman::firstDayOfPesach('5777')->month);
        $this->assertEquals(2017, Zman::firstDayOfPesach('5777')->year);
    }

    /** @test */
    public function checks_if_it_is_pesach()
    {
        $this->assertTrue(Zman::parse('April 11, 2017')->isPesach());
        $this->assertTrue(Zman::parse('April 12, 2017')->isPesach());
        $this->assertTrue(Zman::parse('April 13, 2017')->isPesach());
        $this->assertTrue(Zman::parse('April 14, 2017')->isPesach());
        $this->assertTrue(Zman::parse('April 15, 2017')->isPesach());
        $this->assertTrue(Zman::parse('April 16, 2017')->isPesach());
        $this->assertTrue(Zman::parse('April 17, 2017')->isPesach());
        $this->assertTrue(Zman::parse('April 18, 2017')->isPesach(true));
        $this->assertFalse(Zman::parse('April 18, 2017')->isPesach(false)); // For Israel

        $this->assertFalse(Zman::parse('April 19, 2017')->isPesach());
    }

    /** @test */
    public function gets_the_day_of_pesach_sheni()
    {
        $this->assertEquals(10, Zman::dayOfPesachSheni('5777')->day);
        $this->assertEquals(5, Zman::dayOfPesachSheni('5777')->month);
        $this->assertEquals(2017, Zman::dayOfPesachSheni('5777')->year);
    }

    /** @test */
    public function checks_if_it_is_pesach_sheni()
    {
        $this->assertTrue(Zman::parse('May 10, 2017')->isPesachSheni());
        $this->assertFalse(Zman::parse('May 11, 2017')->isPesachSheni());
    }

    /** @test */
    public function gets_the_first_day_of_shavuos()
    {
        $this->assertEquals(31, Zman::firstDayOfShavuos('5777')->day);
        $this->assertEquals(5, Zman::firstDayOfShavuos('5777')->month);
        $this->assertEquals(2017, Zman::firstDayOfShavuos('5777')->year);
    }

    /** @test */
    public function checks_if_it_is_shavuos()
    {
        $this->assertTrue(Zman::parse('May 31, 2017')->isShavuos());
        $this->assertTrue(Zman::parse('June 1, 2017')->isShavuos(true));
        $this->assertFalse(Zman::parse('June 1, 2017')->isShavuos(false)); // For Israel

        $this->assertFalse(Zman::parse('June 2, 2017')->isShavuos());
    }

    /** @test */
    public function gets_the_first_day_of_rosh_hashana()
    {
        $this->assertEquals(3, Zman::firstDayOfRoshHashana('5777')->day);
        $this->assertEquals(10, Zman::firstDayOfRoshHashana('5777')->month);
        $this->assertEquals(2016, Zman::firstDayOfRoshHashana('5777')->year);
    }

    /** @test */
    public function checks_if_it_is_rosh_hashana()
    {
        $this->assertTrue(Zman::parse('October 3, 2016')->isRoshHashana());
        $this->assertTrue(Zman::parse('October 4, 2016')->isRoshHashana());

        $this->assertFalse(Zman::parse('December 20, 2017')->isRoshHashana());
    }

    /** @test */
    public function gets_the_day_of_shmini_atzeres()
    {
        $this->assertEquals(24, Zman::dayOfShminiAtzeres('5777')->day);
        $this->assertEquals(10, Zman::dayOfShminiAtzeres('5777')->month);
        $this->assertEquals(2016, Zman::dayOfShminiAtzeres('5777')->year);
    }

    /** @test */
    public function checks_if_it_is_shmini_atzeres()
    {
        $this->assertTrue(Zman::parse('October 24, 2016')->isShminiAtzeres());
        $this->assertFalse(Zman::parse('October 25, 2016')->isShminiAtzeres());
    }

    /** @test */
    public function gets_the_day_of_simchas_torah()
    {
        // For Galus
        $this->assertEquals(25, Zman::dayOfSimchasTorah('5777')->day);
        $this->assertEquals(10, Zman::dayOfSimchasTorah('5777')->month);
        $this->assertEquals(2016, Zman::dayOfSimchasTorah('5777')->year);

        // For E"Y
        $this->assertEquals(24, Zman::dayOfSimchasTorah('5777', false)->day);
        $this->assertEquals(10, Zman::dayOfSimchasTorah('5777', false)->month);
        $this->assertEquals(2016, Zman::dayOfSimchasTorah('5777', false)->year);
    }

    /** @test */
    public function checks_if_it_is_simchas_torah()
    {
        $this->assertTrue(Zman::parse('October 25, 2016')->isSimchasTorah());
        $this->assertFalse(Zman::parse('October 25, 2016')->isSimchasTorah(false));

        $this->assertFalse(Zman::parse('October 24, 2016')->isSimchasTorah());
    }

    /** @test */
    public function gets_the_first_day_of_chanuka()
    {
        $chanuka = Zman::firstDayOfChanuka('5777');

        $this->assertEquals(12, $chanuka->month);
        $this->assertEquals(25, $chanuka->day);
        $this->assertEquals(2016, $chanuka->year);
    }

    /** @test */
    public function checks_if_it_is_chanuka()
    {
        // When Kislev has 29 days
        $this->assertTrue(Zman::parse('December 25, 2016')->isChanuka());
        $this->assertTrue(Zman::parse('December 26, 2016')->isChanuka());
        $this->assertTrue(Zman::parse('December 27, 2016')->isChanuka());
        $this->assertTrue(Zman::parse('December 28, 2016')->isChanuka());
        $this->assertTrue(Zman::parse('December 29, 2016')->isChanuka());
        $this->assertTrue(Zman::parse('December 30, 2016')->isChanuka());
        $this->assertTrue(Zman::parse('December 31, 2016')->isChanuka());
        $this->assertTrue(Zman::parse('January 1, 2017')->isChanuka());

        $this->assertFalse(Zman::parse('December 24, 2016')->isChanuka());
        $this->assertFalse(Zman::parse('January 2, 2017')->isChanuka());

        // // When Kislev has 30 days
        $this->assertTrue(Zman::parse('December 13, 2017')->isChanuka());
        $this->assertTrue(Zman::parse('December 14, 2017')->isChanuka());
        $this->assertTrue(Zman::parse('December 15, 2017')->isChanuka());
        $this->assertTrue(Zman::parse('December 16, 2017')->isChanuka());
        $this->assertTrue(Zman::parse('December 17, 2017')->isChanuka());
        $this->assertTrue(Zman::parse('December 18, 2017')->isChanuka());
        $this->assertTrue(Zman::parse('December 19, 2017')->isChanuka());
        $this->assertTrue(Zman::parse('December 20, 2017')->isChanuka());

        $this->assertFalse(Zman::parse('December 12, 2017')->isChanuka());
        $this->assertFalse(Zman::parse('December 21, 2017')->isChanuka());
    }

    /** @test */
    public function gets_the_day_of_tu_bishvat()
    {
        $this->assertEquals(11, Zman::dayOfTuBishvat('5777')->day);
        $this->assertEquals(2, Zman::dayOfTuBishvat('5777')->month);
        $this->assertEquals(2017, Zman::dayOfTuBishvat('5777')->year);
    }

    /** @test */
    public function checks_if_it_is_tu_bshvat()
    {
        $this->assertTrue(Zman::parse('February 11, 2017')->isTuBishvat());
        $this->assertFalse(Zman::parse('February 12, 2017')->isTuBishvat());
    }

    /** @test */
    public function gets_the_day_of_purim()
    {
        $this->assertEquals(12, Zman::dayOfPurim('5777')->day);
        $this->assertEquals(3, Zman::dayOfPurim('5777')->month);
        $this->assertEquals(2017, Zman::dayOfPurim('5777')->year);
    }

    /** @test */
    public function checks_if_it_is_purim()
    {
        // Regular Year
        $this->assertTrue(Zman::parse('March 12, 2017')->isPurim());
        $this->assertFalse(Zman::parse('March 11, 2017')->isPurim());

        // Leap Year
        $this->assertTrue(Zman::parse('March 21, 2019')->isPurim());
        $this->assertFalse(Zman::parse('February 19, 2019')->isPurim());
    }

    /** @test */
    public function gets_the_day_of_shushan_purim()
    {
        // Regular Year
        $this->assertEquals(13, Zman::dayOfShushanPurim('5777')->day);
        $this->assertEquals(3, Zman::dayOfShushanPurim('5777')->month);
        $this->assertEquals(2017, Zman::dayOfShushanPurim('5777')->year);

        // Nidcheh Year
        $this->assertEquals(28, Zman::dayOfShushanPurim('5781')->day);
        $this->assertEquals(2, Zman::dayOfShushanPurim('5781')->month);
        $this->assertEquals(2021, Zman::dayOfShushanPurim('5781')->year);
    }

    /** @test */
    public function checks_if_it_is_shushan_purim()
    {
        // Regular Year
        $this->assertTrue(Zman::parse('March 13, 2017')->isShushanPurim());
        $this->assertFalse(Zman::parse('March 11, 2017')->isShushanPurim());

        // Leap Year
        $this->assertTrue(Zman::parse('March 22, 2019')->isShushanPurim());
        $this->assertFalse(Zman::parse('February 19, 2019')->isShushanPurim());
    }

    /** @test */
    public function gets_the_day_of_purim_kattan()
    {
        $this->assertEquals(19, Zman::dayOfPurimKattan('5779')->day);
        $this->assertEquals(2, Zman::dayOfPurimKattan('5779')->month);
        $this->assertEquals(2019, Zman::dayOfPurimKattan('5779')->year);
    }

    /** @test */
    public function checks_if_it_is_purim_kattan()
    {
        $this->assertTrue(Zman::parse('February 19, 2019')->isPurimKattan());
        $this->assertFalse(Zman::parse('March 21, 2019')->isPurimKattan());
    }

    /** @test */
    public function throws_an_exception_if_purim_kattan_doesnt_exist()
    {
        $this->expectException(InvalidDateException::class);
        $pk = Zman::dayOfPurimKattan('5777');
    }

    /** @test */
    public function gets_the_first_day_of_sukkos()
    {
        $this->assertEquals(17, Zman::firstDayOfSukkos('5777')->day);
        $this->assertEquals(10, Zman::firstDayOfSukkos('5777')->month);
        $this->assertEquals(2016, Zman::firstDayOfSukkos('5777')->year);
    }

    /** @test */
    public function checks_if_it_is_sukkos()
    {
        $this->assertTrue(Zman::parse('October 17, 2016')->isSukkos());
        $this->assertTrue(Zman::parse('October 18, 2016')->isSukkos());
        $this->assertTrue(Zman::parse('October 19, 2016')->isSukkos());
        $this->assertTrue(Zman::parse('October 20, 2016')->isSukkos());
        $this->assertTrue(Zman::parse('October 21, 2016')->isSukkos());
        $this->assertTrue(Zman::parse('October 22, 2016')->isSukkos());
        $this->assertTrue(Zman::parse('October 23, 2016')->isSukkos());

        $this->assertFalse(Zman::parse('October 24, 2016')->isSukkos());
    }
}
