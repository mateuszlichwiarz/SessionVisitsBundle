<?php

declare(strict_types=1);

namespace MLD\SessionVisitsBundle\Component\VisitsTracker\Updater;

use MLD\SessionVisitsBundle\Entity\Visits;

class VisitsUpdater
{
    public function update(Visits $visits): Visits
    {
        return $visits->setVisits($visits->getVisits()+1);
    }
}