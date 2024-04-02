<?php

declare(strict_types=1);

namespace Hume\SessionVisitsBundle\Component\VisitsFinder\Factory;

use Hume\SessionVisitsBundle\Component\VisitsFinder\Finders\Interface\VisitsFinderInterface;
use  Hume\SessionVisitsBundle\Component\DateSystem\Model\Date;

interface VisitsFinderFactoryInterface
{
    public function createFinder(Date $date, array $visitsCollection): VisitsFinderInterface;
}