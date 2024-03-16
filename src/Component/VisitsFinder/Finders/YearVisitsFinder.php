<?php

declare(strict_types=1);

namespace MLD\SessionVisitsBundle\Component\VisitsFinder\Finders;

use MLD\SessionVisitsBundle\Component\VisitsFinder\Finders\Interface\ManyResultsVisitsFinderInterface as VisitsFinderInterface;

use MLD\SessionVisitsBundle\Entity\Date;

final class YearVisitsFinder implements VisitsFinderInterface
{
    private ?array $foundedVisits = null;

    public function __construct(
        private Date $date,
        private array $visitsCollection,
    ){
        $this->collectionOperation();
    }
    
    public function find(): array
    {
        if(!is_null($this->foundedVisits)) {
            return $this->foundedVisits;
        }else {
            throw new \Exception('no found');
        }
    }

    private function collectionOperation(): void
    {
        foreach($this->visitsCollection as $visit) {
            if($this->date->getYear() === $visit->getYear()
             ) {
                $this->foundedVisits[] = $visit;
            }
        }
    }
}