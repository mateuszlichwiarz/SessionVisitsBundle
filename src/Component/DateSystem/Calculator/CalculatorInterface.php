<?php

declare(strict_types=1);

namespace Hume\SessionVisitsBundle\Component\DateSystem\Calculator;

interface CalculatorInterface
{
    public function calculate(int $day): int ;
}