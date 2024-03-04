<?php

declare(strict_types=1);

namespace App\DateSystem;

use App\DateSystem\Entity\Date;

interface DateSystemInterface
{
    public function create(string $date = null): Date;
}