<?php

declare(strict_types=1);

namespace Hume\SessionVisitsBundle\Component\VisitsTracker\Resolver;

use Hume\SessionVisitsBundle\Component\VisitsTracker\Factory\VisitsFactoryInterface;

use Hume\SessionVisitsBundle\Entity\Visits;
use Hume\SessionVisitsBundle\Entity\Date;

class NewOrAddVisitsResolver
{

    public function __construct(
        private VisitsFactoryInterface $visitsFactory,
    ){}

    public function resolve(
        Null|Visits $visits = null,
        Date $date
    ): Visits
    {
        return $visits === null 
            ? $this->visitsFactory->create($date)
            : $visits->addVisitsAmount(1)
        ;
    }
}