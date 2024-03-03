<?php

declare(strict_types=1);

namespace App\VisitsFinder\Finders\Interface;

interface ManyResultsVisitsFinderInterface extends VisitsFinderInterface
{
    public function find(): array;
}