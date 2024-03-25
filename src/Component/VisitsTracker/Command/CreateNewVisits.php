<?php

declare(strict_types=1);

namespace MLD\SessionVisitsBundle\Component\VisitsTracker\Command;

final class CreateNewVisits
{
    public function __construct(
        readonly private ?int $month,
        readonly private ?int $week,
        readonly private ?int $year,
        readonly private ?int $visits,
    ){}

    public function getMonth(): ?int
    {
        return $this->month;
    }

    public function getWeek(): ?int
    {
        return $this->week;
    }

    public function getYear(): ?int
    {
        return $this->year;
    }

    public function getVisits(): ?int
    {
        return $this->visits;
    }
}