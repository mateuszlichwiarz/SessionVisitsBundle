<?php

declare(strict_types=1);

namespace Hume\SessionVisitsBundle\Component\DateSystem\Model;

use Hume\SessionVisitsBundle\Component\DateSystem\Calculator\WeekCalculator;

use DateTimeImmutable;

class Date
{
    protected int $day;

    protected int $week;

    protected int $month;

    protected int $year;

    public function __construct(
        private WeekCalculator $weekCalculator,
        private DateTimeImmutable $date,
    ){}

    public function convertDateTimeInt(): self
    {
        $this->day   = intval($this->date->format('d'));
        $this->week  = $this->weekCalculator->calculate($this->day);
        $this->month = intval($this->date->format('m'));
        $this->year  = intval($this->date->format('Y'));

        return $this;
    }

    public function stringDateFormat(): string
    {
        return (string) $this->day.'-'.$this->month.'-'.$this->year;
    }

    public function getDay(): int
    {
        return $this->day;
    }

    public function getWeek(): int
    {
        return $this->week;
    }

    public function getMonth(): int
    {
        return $this->month;
    }

    public function getYear(): int
    {
        return $this->year;
    }
}