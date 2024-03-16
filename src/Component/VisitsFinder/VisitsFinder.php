<?php

namespace MLD\SessionVisitsBundle\VisitsFinder;

use MLD\SessionVisitsBundle\Entity\Visits;

use MLD\SessionVisitsBundle\VisitsFinder\Factory\VisitsFinderFactoryInterface;
use MLD\SessionVisitsBundle\VisitsFinder\VisitsFinderInterface;

use MLD\SessionVisitsBundle\Entity\Date;

class VisitsFinder implements VisitsFinderInterface
{
    private ?array $visitsCollection = null;

    private array $visitsFound;

    private const EXCEPTION_MESSAGE = 'No visits provided. Solve: use prepare($visitsCollection)';

    public function __construct(
        private VisitsFinderFactoryInterface $weekVisitsFinderFactory,
        private VisitsFinderFactoryInterface $monthVisitsFinderFactory,
        private VisitsFinderFactoryInterface $yearVisitsFinderFactory,
    )
    {}

    public function prepare(array $visitsCollection): void
    {
        $this->visitsCollection = $visitsCollection;
    }
    
    public function findWeek(Date $date): Visits
    {
        if(!is_null($this->visitsCollection)) {
            return $this->weekVisitsFinderFactory->createFinder(
                    $date,
                    $this->visitsCollection
                )->find();
        }else {
            throw new \Exception(self::EXCEPTION_MESSAGE);
        }
    }

    public function findMonth(Date $date): array
    {
        if(($this->visitsCollection !== null)) {
            return $this->monthVisitsFinderFactory->createFinder(
                    $date, 
                    $this->visitsCollection
                )->find();
        }else {
            throw new \Exception(self::EXCEPTION_MESSAGE);
        }
    }

    public function findYear(Date $date): array
    {
        if(!is_null($this->visitsCollection)) {
            return $this->yearVisitsFinderFactory->createFinder(
                $date, $this->visitsCollection)->find();
        }else {
            return throw new \Exception(self::EXCEPTION_MESSAGE);
        }
    }
}