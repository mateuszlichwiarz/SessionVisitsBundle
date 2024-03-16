<?php

declare(strict_types=1);

namespace MLD\SessionVisitsBundle\Component\VisitsTracker\Resolver;

use MLD\SessionVisitsBundle\Component\VisitsTracker\Factory\VisitsFactory;
use MLD\SessionVisitsBundle\Component\VisitsTracker\Updater\VisitsUpdater;
use MLD\SessionVisitsBundle\Component\VisitsTracker\Persister\VisitsPersister;
use MLD\SessionVisitsBundle\Repository\VisitsRepository;
use MLD\SessionVisitsBundle\Entity\Visits;

use MLD\SessionVisitsBundle\Entity\Date;
use MLD\SessionVisitsBundle\Component\DateSystem\Factory\CurrentDateFactory;

class VisitsSaveResolver
{
    private Date $date;

    private ?Visits $visits = null;

    public function __construct(
        private VisitsRepository $visitsRepository,
        private VisitsFactory $visitsFactory,
        private VisitsUpdater $visitsUpdater,
        private VisitsPersister $visitsPersister,
        private CurrentDateFactory $currentDateFactory,
    ){
        $this->date = $this->currentDateFactory->create();
        $this->visits = $this->findVisit();
    }

    public function save(): void
    {
        $this->visitsPersister->persist($this->visits === null 
            ? $this->visitsFactory->create($this->date)
            : $this->visitsUpdater->update($this->visits)
        );
    }

    private function findVisit(): ?Visits
    {
        return $this->visitsRepository->findOneVisitsObjectByDate($this->date);
    }
}