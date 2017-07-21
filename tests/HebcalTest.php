<?php

use Zman\Helpers\Hebcal;

class HebcalTest extends \PHPUnit\Framework\TestCase
{
    /** @test */
    public function converts_numbers_to_hebrew()
    {
        $this->assertEquals('א׳', Hebcal::numberToHebrew(1));
        $this->assertEquals('ב׳', Hebcal::numberToHebrew(2));
        $this->assertEquals('ג׳', Hebcal::numberToHebrew(3));

        $this->assertEquals('ט׳', Hebcal::numberToHebrew(9));
        $this->assertEquals('י׳', Hebcal::numberToHebrew(10));
        $this->assertEquals('י״ד', Hebcal::numberToHebrew(14));
        $this->assertEquals('ט״ו', Hebcal::numberToHebrew(15));
        $this->assertEquals('ט״ז', Hebcal::numberToHebrew(16));
        $this->assertEquals('י״ז', Hebcal::numberToHebrew(17));
        $this->assertEquals('י״ח', Hebcal::numberToHebrew(18));

        $this->assertEquals('כ׳', Hebcal::numberToHebrew(20));
        $this->assertEquals('כ״א', Hebcal::numberToHebrew(21));

        $this->assertEquals('שט״ו', Hebcal::numberToHebrew(315));
    }
}
