<?php

declare(strict_types=1);

namespace MLD\SessionVisitsBundle\VisitsFinder\Factory;

use MLD\SessionVisitsBundle\VisitsFinder\Factory\VisitsFinderFactoryInterface;
use MLD\SessionVisitsBundle\VisitsFinder\Finders\WeekVisitsFinder;
use MLD\SessionVisitsBundle\Entity\Date;
use MLD\SessionVisitsBundle\VisitsFinder\Finders\Interface\VisitsFinderInterface;

final class WeekVisitsFinderFactory implements VisitsFinderFactoryInterface
{
    public function createFinder(Date $date, array $visitsCollection): VisitsFinderInterface
    {
        $visitsFinder = new WeekVisitsFinder($date, $visitsCollection);

        return $visitsFinder;
    }
}