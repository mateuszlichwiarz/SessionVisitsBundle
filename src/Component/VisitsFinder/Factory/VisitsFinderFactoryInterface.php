<?php

declare(strict_types=1);

namespace MLD\SessionVisitsBundle\Component\VisitsFinder\Factory;

use MLD\SessionVisitsBundle\Component\VisitsFinder\Finders\Interface\VisitsFinderInterface;
use MLD\SessionVisitsBundle\Entity\Date;

interface VisitsFinderFactoryInterface
{
    public function createFinder(Date $date, array $visitsCollection): VisitsFinderInterface;
}