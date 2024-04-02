<?php

declare(strict_types=1);

namespace Hume\SessionVisitsBundle\Component\VisitsTracker\Factory;

use  Hume\SessionVisitsBundle\Component\DateSystem\Model\Date;
use Hume\SessionVisitsBundle\Entity\Visits;

interface VisitsFactoryInterface
{
    public function create(Date $date): Visits;
}