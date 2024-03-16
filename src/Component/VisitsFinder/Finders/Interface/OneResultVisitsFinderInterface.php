<?php

declare(strict_types=1);

namespace MLD\SessionVisitsBundle\Component\VisitsFinder\Finders\Interface;

use MLD\SessionVisitsBundle\Entity\Visits;

interface OneResultVisitsFinderInterface extends VisitsFinderInterface
{
    public function find(): Visits;
}