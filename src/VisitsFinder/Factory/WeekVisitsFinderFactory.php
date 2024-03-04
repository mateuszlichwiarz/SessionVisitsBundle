<?php

declare(strict_types=1);

namespace App\VisitsFinder\Factory;

use App\VisitsFinder\Factory\VisitsFinderFactoryInterface;
use App\VisitsFinder\Finders\WeekVisitsFinder;
use App\BetterDate\Entity\Date;
use App\VisitsFinder\Finders\Interface\VisitsFinderInterface;

final class WeekVisitsFinderFactory implements VisitsFinderFactoryInterface
{
    public function createFinder(Date $date, array $visitsCollection): VisitsFinderInterface
    {
        $visitsFinder = new WeekVisitsFinder($date, $visitsCollection);

        return $visitsFinder;
    }
}