<?php

declare(strict_types=1);

namespace MLD\SessionVisitsBundle\VisitsTracker;

use MLD\SessionVisitsBundle\Entity\Visits;

class VisitsUpdater
{
    public function updateVisits(Visits $visit): Visits
    {
        return $visit->setVisits($visit->getVisits()+1);
    }
}