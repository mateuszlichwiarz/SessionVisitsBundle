<?php

declare(strict_types=1);

namespace App\VisitRegister;

use App\VisitRegister\VisitFactory;
use App\VisitRegister\VisitsUpdater;
use App\VisitRegister\Persister\VisitPersister;
use App\Repository\VisitsRepository;
use App\Entity\Visits;

use App\BetterDate\Entity\Date;
use App\BetterDate\Factory\CurrentDateFactory;

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