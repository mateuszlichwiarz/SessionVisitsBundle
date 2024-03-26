<?php

declare(strict_types=1);

namespace Hume\SessionVisitsBundle\Component\VisitsTracker\Factory;

use Hume\SessionVisitsBundle\Entity\Visits;
use Hume\SessionVisitsBundle\Entity\Date;

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