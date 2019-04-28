<?php

namespace Test\Helpers;

use Zman\Exceptions\InvalidDateException;

class holidaysTest extends \PHPUnit\Framework\TestCase
{
    /** @test */
    public function it_loads_the_parshios_dictionary()
    {
        require(__DIR__ . '../../../src/Helpers/holidays.php');

        foreach (HOLIDAYS as $holiday) {
            $this->assertArrayHasKey('english', $holiday);
            $this->assertArrayHasKey('hebrew', $holiday);
        }
    }
}
