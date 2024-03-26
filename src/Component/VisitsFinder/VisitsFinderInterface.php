<?php

declare(strict_types=1);

namespace Hume\SessionVisitsBundle\Component\VisitsFinder;

use Hume\SessionVisitsBundle\Entity\Date;
use Hume\SessionVisitsBundle\Entity\Visits;

interface VisitsFinderInterface
{
    public function prepare(array $visitsCollection): void;

    public function findWeek(Date $date): Visits;

    public function findMonth(Date $date): array;

    public function findYear(Date $date): array;
}