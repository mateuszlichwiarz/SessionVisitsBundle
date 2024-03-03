<?php

declare(strict_types=1);

namespace App\VisitsFinder;

use App\BetterDate\Entity\Date;
use App\Entity\Visits;

interface VisitsFinderInterface
{
    public function prepare(array $visitsCollection): void;

    public function findWeek(Date $date): Visits;

    public function findMonth(Date $date): array;

    public function findYear(Date $date): array;
}