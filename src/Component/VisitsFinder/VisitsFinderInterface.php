<?php

declare(strict_types=1);

namespace MLD\SessionVisitsBundle\Component\VisitsFinder;

use MLD\SessionVisitsBundle\Entity\Date;
use MLD\SessionVisitsBundle\Entity\Visits;

interface VisitsFinderInterface
{
    public function prepare(array $visitsCollection): void;

    public function findWeek(Date $date): Visits;

    public function findMonth(Date $date): array;

    public function findYear(Date $date): array;
}