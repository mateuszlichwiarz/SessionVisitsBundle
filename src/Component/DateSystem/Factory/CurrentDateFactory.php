<?php

declare(strict_types=1);

namespace Hume\SessionVisitsBundle\Component\DateSystem\Factory;

use Hume\SessionVisitsBundle\Component\DateSystem\Factory\Interface\DateFactoryInterface;
use Hume\SessionVisitsBundle\Entity\Date;

use DateTime;

class CurrentDateFactory implements DateFactoryInterface
{
    public function create(): Date
    {
        $date = new DateTime('now');

        return new Date($date);

    }
}