<?php

declare(strict_types=1);

namespace Hume\SessionVisitsBundle\Component\VisitsFinder;

class VisitsFoundCounter
{
    public function count(array $visitsFound): int
    {
        $sumVisits = 0;
        foreach($visitsFound as $visit) {
            $sumVisits += $visit->getVisits();
        }
        return $sumVisits;
    }
}