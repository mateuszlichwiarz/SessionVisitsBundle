<?php

declare(strict_types=1);

namespace MLD\SessionVisitsBundle\Component\VisitsTracker\Resolver;

use MLD\SessionVisitsBundle\Component\DateSystem\Factory\CustomDateFactory;
use MLD\SessionVisitsBundle\Component\VisitsTracker\Factory\VisitsFactory;

use MLD\SessionVisitsBundle\Entity\Visits;
use MLD\SessionVisitsBundle\Entity\Date;

class NewOrAddVisitsResolver
{

    public function __construct(
        private VisitsFactory $visitsFactory,
        private CustomDateFactory $dateFactory,
    ){}

    public function resolve(
        Visits $visits,
        Date $date
    ): Visits
    {
        return $visits === null 
            ? $this->visitsFactory->create($date)
            : $visits->addVisitsAmount(1)
        ;
    }
}