<?php

declare(strict_types=1);

namespace Hume\SessionVisitsBundle\Component\DateSystem\Factory\Interface;

use Hume\SessionVisitsBundle\Entity\Date;

interface CustomDateFactoryInterface extends DateFactoryInterface
{
    public function create(string $date = null): Date;
}