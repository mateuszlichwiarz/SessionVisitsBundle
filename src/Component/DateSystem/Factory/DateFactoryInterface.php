<?php

declare(strict_types=1);

namespace Hume\SessionVisitsBundle\Component\DateSystem\Factory;

use Hume\SessionVisitsBundle\Component\DateSystem\Model\Date;

interface DateFactoryInterface
{
    public function create(string $date = 'now'): Date;
}