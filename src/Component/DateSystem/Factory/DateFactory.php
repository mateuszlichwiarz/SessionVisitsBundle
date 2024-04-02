<?php

declare(strict_types=1);

namespace Hume\SessionVisitsBundle\Component\DateSystem\Factory;

use Hume\SessionVisitsBundle\Component\DateSystem\Calculator\WeekCalculator;
use Hume\SessionVisitsBundle\Component\DateSystem\Model\Date;
use Hume\SessionVisitsBundle\Component\DateSystem\Factory\DateFactoryInterface;

class DateFactory implements DateFactoryInterface
{
    public function __construct(
        private WeekCalculator $weekCalculator
    ){}

    public function create(string $date = 'now'): Date
    {
        $date = new Date(
            $this->weekCalculator,
            new \DateTimeImmutable($date)
        );
        return $date->convertDateTimeInt();
    }

}