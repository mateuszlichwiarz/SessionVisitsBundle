<?php

declare(strict_types=1);

namespace Hume\SessionVisitsBundle\Component\DateSystem\Factory;

use Hume\SessionVisitsBundle\Component\DateSystem\Factory\Interface\CustomDateFactoryInterface as DateFactoryInterface;
use Hume\SessionVisitsBundle\Entity\Date;

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