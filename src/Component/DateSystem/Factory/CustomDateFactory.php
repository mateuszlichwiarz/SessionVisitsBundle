<?php

declare(strict_types=1);

namespace MLD\SessionVisitsBundle\Component\DateSystem\Factory;

use MLD\SessionVisitsBundle\Component\DateSystem\Factory\Interface\CustomDateFactoryInterface as DateFactoryInterface;
use MLD\SessionVisitsBundle\Entity\Date;

use DateTime;

class CustomDateFactory implements DateFactoryInterface
{
    public function create(?string $date = null): Date
    {
        return new Date(
            new DateTime($date)
        );
    }
}