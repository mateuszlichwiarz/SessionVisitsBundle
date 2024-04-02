<?php

declare(strict_types=1);

namespace Hume\SessionVisitsBundle\tests\Component\DateSystem\Calculator\WeekCalculator;

use PHPUnit\Framework\TestCase;

use Hume\SessionVisitsBundle\Component\DateSystem\Calculator\WeekCalculator;
use InvalidArgumentException;

final class WeekCalculatorTest extends TestCase
{
    protected WeekCalculator $weekCalculator;

    public function setUp(): void
    {
        $this->weekCalculator = new WeekCalculator();
    }

    public function testFirstDayOfWeek(): void
    {
        $this->assertSame(1, $this->weekCalculator->calculate(1));
        $this->assertSame(2, $this->weekCalculator->calculate(8));
        $this->assertSame(3, $this->weekCalculator->calculate(15));
        $this->assertSame(4, $this->weekCalculator->calculate(22));
        $this->assertSame(5, $this->weekCalculator->calculate(29));
    }

    public function testLastDayOfWeek(): void
    {
        $this->assertSame(1, $this->weekCalculator->calculate(7));
        $this->assertSame(2, $this->weekCalculator->calculate(14));
        $this->assertSame(3, $this->weekCalculator->calculate(21));
        $this->assertSame(4, $this->weekCalculator->calculate(28));
        $this->assertSame(5, $this->weekCalculator->calculate(31));
    }

    public function testValidDay(): void
    {
        $this->expectException(InvalidArgumentException::class);

        $this->weekCalculator->calculate(32);
    }
}