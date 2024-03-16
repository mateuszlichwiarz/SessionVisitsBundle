<?php

declare(strict_types=1);

namespace MLD\SessionVisitsBundle\Component\VisitsFinder\Factory;

use MLD\SessionVisitsBundle\Component\VisitsFinder\Factory\VisitsFinderFactoryInterface;
use MLD\SessionVisitsBundle\Component\VisitsFinder\Finders\YearVisitsFinder;
use MLD\SessionVisitsBundle\Entity\Date;
use MLD\SessionVisitsBundle\Component\VisitsFinder\Finders\Interface\VisitsFinderInterface;

final class YearVisitsFinderFactory implements VisitsFinderFactoryInterface
{
    public function createFinder(Date $date, array $visitsCollection): VisitsFinderInterface
    {
        $visitsFinder = new YearVisitsFinder($date, $visitsCollection);

        return $visitsFinder;
    }
}