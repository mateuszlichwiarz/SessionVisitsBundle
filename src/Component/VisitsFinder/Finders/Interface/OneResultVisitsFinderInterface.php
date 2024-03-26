<?php

declare(strict_types=1);

namespace Hume\SessionVisitsBundle\Component\VisitsFinder\Finders\Interface;

use Hume\SessionVisitsBundle\Entity\Visits;

interface OneResultVisitsFinderInterface extends VisitsFinderInterface
{
    public function find(): Visits;
}