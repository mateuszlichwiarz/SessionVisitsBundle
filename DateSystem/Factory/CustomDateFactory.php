<?php

declare(strict_types=1);

namespace App\DateSystem\Factory;

use App\DateSystem\Factory\Interface\CustomDateFactoryInterface as DateFactoryInterface;
use App\DateSystem\Entity\Date;

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