<?php

declare(strict_types=1);

namespace App\VisitsFinder\Factory;

use App\VisitsFinder\Finders\Interface\VisitsFinderInterface;
use App\BetterDate\Entity\Date;

interface VisitsFinderFactoryInterface
{
    public function createFinder(Date $date, array $visitsCollection): VisitsFinderInterface;
}