<?php

declare(strict_types=1);

namespace Hume\SessionVisitsBundle\Component\VisitsFinder\Factory;

use Hume\SessionVisitsBundle\Component\VisitsFinder\Factory\VisitsFinderFactoryInterface;
use Hume\SessionVisitsBundle\Component\VisitsFinder\Finders\WeekVisitsFinder;
use Hume\SessionVisitsBundle\Entity\Date;
use Hume\SessionVisitsBundle\Component\VisitsFinder\Finders\Interface\VisitsFinderInterface;

final class WeekVisitsFinderFactory implements VisitsFinderFactoryInterface
{
    public function createFinder(Date $date, array $visitsCollection): VisitsFinderInterface
    {
        $visitsFinder = new WeekVisitsFinder($date, $visitsCollection);

        return $visitsFinder;
    }
}