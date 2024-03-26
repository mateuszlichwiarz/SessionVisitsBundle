<?php

declare(strict_types=1);

namespace Hume\SessionVisitsBundle\Entity;

use Hume\SessionVisitsBundle\Component\DateSystem\Calculator\Trait\WeeksCalculatorTrait;
use DateTime;

class Date
{
    protected ?int $day;

    protected ?int $week;

    protected ?int $month;

    protected ?int $year;

    use WeeksCalculatorTrait;

    public function __construct(DateTime $dateTime)
    {
        $this->day   = intval($dateTime->format('d'));
        $this->month = intval($dateTime->format('m'));
        $this->week  = $this->calculateWeek($this->getDay());
        $this->year  = intval($dateTime->format('Y'));
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

    public function stringDateFormat(): string
    {
        return (string) $this->day.'-'.$this->month.'-'.$this->year;
    }
}