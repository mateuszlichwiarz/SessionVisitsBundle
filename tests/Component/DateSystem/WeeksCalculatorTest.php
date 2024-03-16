<?php

namespace MLD\SessionVisitsBundle\Tests\Component\DateSystem;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

use MLD\SessionVisitsBundle\Component\DateSystem\Calculator\Trait\WeeksCalculatorTrait;

final class DateTest extends KernelTestCase
{
    use WeeksCalculatorTrait;

    public function testProperOutputCalculateWeek()
    {
        $day = 3;
        $week = $this->calculateWeek($day);

        $this->assertEquals(1, $week);

        $day = 3+7;
        $week = $this->calculateWeek($day);
        $this->assertEquals(2, $week);

        $day = 3+14;
        $week = $this->calculateWeek($day);
        $this->assertEquals(3, $week);

        $day = 3+21;
        $week = $this->calculateWeek($day);
        $this->assertEquals(4, $week);

        $day = 3+28;
        $week = $this->calculateWeek($day);
        $this->assertEquals(5, $week);
    }
}