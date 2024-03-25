<?php

declare(strict_types=1);

namespace MLD\SessionVisitsBundle\Component\VisitsTracker\Factory;

use MLD\SessionVisitsBundle\Entity\Date;
use MLD\SessionVisitsBundle\Entity\Visits;

interface VisitsFactoryInterface
{
    public function create(Date $date): Visits;
}