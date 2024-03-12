<?php

declare(strict_types=1);

namespace MLD\SessionVisitsBundle\DateSystem\Factory\Interface;

use MLD\SessionVisitsBundle\Entity\Date;

interface CustomDateFactoryInterface extends DateFactoryInterface
{
    public function create(string $date = null): Date;
}