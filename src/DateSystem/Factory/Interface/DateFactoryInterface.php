<?php

declare(strict_types=1);

namespace App\DateSystem\Factory\Interface;

use App\DateSystem\Entity\Date;

interface DateFactoryInterface
{
    public function create(): Date;
}