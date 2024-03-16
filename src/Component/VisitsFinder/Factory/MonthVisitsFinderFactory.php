<?php

declare(strict_types=1);

namespace MLD\SessionVisitsBundle\Component\VisitsFinder\Factory;

use MLD\SessionVisitsBundle\Component\VisitsFinder\Factory\VisitsFinderFactoryInterface;
use MLD\SessionVisitsBundle\Component\VisitsFinder\Finders\MonthVisitsFinder;
use MLD\SessionVisitsBundle\Entity\Date;
use MLD\SessionVisitsBundle\Component\VisitsFinder\Finders\Interface\VisitsFinderInterface;

final class MonthVisitsFinderFactory implements VisitsFinderFactoryInterface
{
    public function createFinder(Date $date, array $visitsCollection): VisitsFinderInterface
    {
        $visitsFinder = new MonthVisitsFinder($date, $visitsCollection);

        return $visitsFinder;
    }
}