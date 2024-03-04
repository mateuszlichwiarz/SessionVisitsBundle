<?php

declare(strict_types=1);

namespace App\DateSystem\Factory\Interface;

use App\DateSystem\Entity\Date;

interface CustomDateFactoryInterface extends DateFactoryInterface
{
    public function create(string $date = null): Date;
}