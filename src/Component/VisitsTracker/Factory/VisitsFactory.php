<?php

declare(strict_types=1);

namespace MLD\SessionVisitsBundle\Component\VisitsTracker\Factory;

use MLD\SessionVisitsBundle\Entity\Visits;
use MLD\SessionVisitsBundle\Entity\Date;

class VisitsFactory implements VisitsFactoryInterface
{
    public function create(Date $date): Visits
    {
        return new Visits(
            $date->getMonth(),
            $date->getWeek(),
            $date->getYear(),
            1
        );
    }
}