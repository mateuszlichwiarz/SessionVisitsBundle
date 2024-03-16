<?php

declare(strict_types=1);

namespace MLD\SessionVisitsBundle\Component\VisitsFinder\Finders\Interface;

interface ManyResultsVisitsFinderInterface extends VisitsFinderInterface
{
    public function find(): array;
}