<?php

declare(strict_types=1);

namespace Hume\SessionVisitsBundle\Component\DateSystem\Calculator;

use Hume\SessionVisitsBundle\Component\DateSystem\Calculator\CalculatorInterface;

class WeekCalculator implements CalculatorInterface
{
    public function calculate(int $day): int
    {
        switch($day) {
            case ($day > 0 && $day <= 7):
                return 1;
            case ($day > 7 && $day <= 14):
                return 2;
            case ($day > 14 && $day <= 21):
                return 3;
            case ($day > 21 && $day <= 28):
                return 4;
            case ($day > 28 && $day <= 31):
                return 5;
            default:
                throw new \InvalidArgumentException('That day is no exist in month.');
        };
    }
}