<?php

declare(strict_types=1);

namespace App\DateSystem\Factory;

use App\DateSystem\Factory\Interface\DateFactoryInterface;
use App\DateSystem\Entity\Date;

use DateTime;

class CurrentDateFactory implements DateFactoryInterface
{
    public function create(): Date
    {
        $date = new DateTime('now');

        return new Date($date);

    }
}