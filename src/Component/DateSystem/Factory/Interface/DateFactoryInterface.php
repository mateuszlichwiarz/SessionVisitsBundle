<?php

declare(strict_types=1);

namespace Hume\SessionVisitsBundle\Component\DateSystem\Factory\Interface;

use Hume\SessionVisitsBundle\Entity\Date;

interface DateFactoryInterface
{
    public function create(): Date;
}