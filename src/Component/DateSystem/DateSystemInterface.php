<?php

declare(strict_types=1);

namespace Hume\SessionVisitsBundle\Component\DateSystem;

use Hume\SessionVisitsBundle\Entity\Date;

interface DateSystemInterface
{
    public function create(string $date = null): Date;
}