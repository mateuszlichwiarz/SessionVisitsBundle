<?php

declare(strict_types=1);

namespace Hume\SessionVisitsBundle\Component\VisitsFinder\Factory;

use Hume\SessionVisitsBundle\Component\VisitsFinder\Factory\VisitsFinderFactoryInterface;
use Hume\SessionVisitsBundle\Component\VisitsFinder\Finders\YearVisitsFinder;
use  Hume\SessionVisitsBundle\Component\DateSystem\Model\Date;
use Hume\SessionVisitsBundle\Component\VisitsFinder\Finders\Interface\VisitsFinderInterface;

final class YearVisitsFinderFactory implements VisitsFinderFactoryInterface
{
    public function createFinder(Date $date, array $visitsCollection): VisitsFinderInterface
    {
        $visitsFinder = new YearVisitsFinder($date, $visitsCollection);

        return $visitsFinder;
    }
}