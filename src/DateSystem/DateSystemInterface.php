<?php

declare(strict_types=1);

namespace MLD\SessionVisitsBundle\DateSystem;

use MLD\SessionVisitsBundle\Entity\Date;

interface DateSystemInterface
{
    public function create(string $date = null): Date;
}