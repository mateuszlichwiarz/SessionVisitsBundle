<?php

declare(strict_types=1);

namespace App\VisitsFinder\Finders\Interface;

use App\Entity\Visits;

interface OneResultVisitsFinderInterface extends VisitsFinderInterface
{
    public function find(): Visits;
}