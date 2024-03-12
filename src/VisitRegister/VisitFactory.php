<?php

declare(strict_types= 1);

namespace MLD\SessionVisitsBundle\VisitRegister;

use MLD\SessionVisitsBundle\Entity\Visits;

use MLD\SessionVisitsBundle\Entity\Date;

class VisitFactory
{
    public function create(Date $date): Visits
    {
        $visit = new Visits();

        return $visit
            ->setMonth($date->getMonth())
            ->setWeek($date->getWeek())
            ->setYear($date->getYear())
            ->setVisits(1);
    }
}