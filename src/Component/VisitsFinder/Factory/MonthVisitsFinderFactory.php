<?php

declare(strict_types=1);

namespace Hume\SessionVisitsBundle\Component\VisitsFinder\Factory;

use Hume\SessionVisitsBundle\Component\VisitsFinder\Factory\VisitsFinderFactoryInterface;
use Hume\SessionVisitsBundle\Component\VisitsFinder\Finders\MonthVisitsFinder;
use Hume\SessionVisitsBundle\Entity\Date;
use Hume\SessionVisitsBundle\Component\VisitsFinder\Finders\Interface\VisitsFinderInterface;

final class MonthVisitsFinderFactory implements VisitsFinderFactoryInterface
{
    public function createFinder(Date $date, array $visitsCollection): VisitsFinderInterface
    {
        $visitsFinder = new MonthVisitsFinder($date, $visitsCollection);

        return $visitsFinder;
    }
}