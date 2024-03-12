<?php

declare(strict_types=1);

namespace MLD\SessionVisitsBundle\DateSystem\Factory\Interface;

use MLD\SessionVisitsBundle\Entity\Date;

interface DateFactoryInterface
{
    public function create(): Date;
}