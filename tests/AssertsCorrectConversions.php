<?php

declare(strict_types = 1);

namespace UnitConverter\Tests;

use UnitConverter\Unit\UnitInterface;
use UnitConverter\UnitConverter;

trait AssertsCorrectConversions
{
    /**
     * @test
     * @dataProvider correctConversions
     * @param UnitInterface $from
     * @param UnitInterface $to
     * @param int $precision
     * @return void
     */
    public function assertCorrectConversions(UnitInterface $from, UnitInterface $to, int $precision = null): void
    {
        $this->assertSame($from->getUnitOf(), $to->getUnitOf(), 'Cannot convert units that do not share a measurement');

        $expected = $to->getValue();
        $actual = $from->as($to, $precision);

        $this->assertEquals($expected, $actual);
        $this->assertSame($expected, $actual);
    }
}