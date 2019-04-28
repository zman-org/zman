<?php

namespace Test\Helpers;

use Zman\Exceptions\InvalidDateException;

class parshiosTest extends \PHPUnit\Framework\TestCase
{
    /** @test */
    public function it_loads_the_parshios_dictionary()
    {
        require __DIR__ . '../../../src/Helpers/parshios.php';

        foreach (PARSHIOS as $parsha) {
            $this->assertArrayHasKey('english', $parsha);
            $this->assertArrayHasKey('hebrew', $parsha);
        }
    }
}
