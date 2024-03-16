<?php

declare(strict_types=1);

namespace MLD\SessionVisitsBundle\Component\DateSystem\Factory;

use MLD\SessionVisitsBundle\Component\DateSystem\Factory\Interface\DateFactoryInterface;
use MLD\SessionVisitsBundle\Entity\Date;

use DateTime;

class CurrentDateFactory implements DateFactoryInterface
{
    public function create(): Date
    {
        $date = new DateTime('now');

        return new Date($date);

    }
}