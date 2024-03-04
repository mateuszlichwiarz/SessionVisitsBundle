<?php

declare(strict_types= 1);

namespace App\VisitRegister;

use App\Entity\Visits;

use App\BetterDate\Entity\Date;

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