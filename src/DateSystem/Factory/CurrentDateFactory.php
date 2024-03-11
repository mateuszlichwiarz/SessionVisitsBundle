<?php

declare(strict_types=1);

namespace MLD\SessionVisitsBundle\Factory;

use MLD\SessionVisitsBundle\Factory\Interface\DateFactoryInterface;
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