<?php

declare(strict_types=1);

namespace MLD\SessionVisitsBundle\VisitRegister;

use MLD\SessionVisitsBundle\VisitRegister\VisitFactory;
use MLD\SessionVisitsBundle\VisitRegister\VisitsUpdater;
use MLD\SessionVisitsBundle\VisitRegister\Persister\VisitPersister;
use MLD\SessionVisitsBundle\Repository\VisitsRepository;
use MLD\SessionVisitsBundle\Entity\Visits;

use MLD\SessionVisitsBundle\Entity\Date;
use MLD\SessionVisitsBundle\DateSystem\Factory\CurrentDateFactory;

class VisitsRecorder
{
    private Date $date;

    private ?Visits $visit = null;

    public function __construct(
        private VisitsRepository $visitsRepository,
        private VisitFactory $visitFactory,
        private VisitsUpdater $visitsUpdater,
        private VisitPersister $visitPersister,
        private CurrentDateFactory $currentDateFactory,
    ){
        $this->date = $this->currentDateFactory->create();
        $this->visit = $this->findVisit();
    }

    public function saveVisit(): void
    {
        if($this->visit === null) {
            $visitModified = $this->visitFactory->create($this->date);
        }else {
            $visitModified = $this->visitsUpdater->updateVisits($this->visit);
        }
        $this->visitPersister->persist($visitModified);
    }

    private function findVisit(): ?Visits
    {
        return $this->visitsRepository->findOneVisitsObjectByDate($this->date);
    }
}