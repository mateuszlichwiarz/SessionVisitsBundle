<?php

declare(strict_types=1);

namespace MLD\SessionVisitsBundle\Component\VisitsTracker;

use MLD\SessionVisitsBundle\Component\VisitsTracker\Session\SessionRegister;
use MLD\SessionVisitsBundle\Component\VisitsTracker\Resolver\NewOrAddVisitsResolver;
use MLD\SessionVisitsBundle\Component\VisitsTracker\Persister\VisitsPersister;
use MLD\SessionVisitsBundle\Component\DateSystem\Factory\CurrentDateFactory;
use MLD\SessionVisitsBundle\Repository\VisitsRepository;

use MLD\SessionVisitsBundle\Entity\Visits;
use MLD\SessionVisitsBundle\Entity\Date;

class VisitsTracker
{
    private Date $date;

    private ?Visits $visits = null;

    public function __construct(
        private SessionRegister $sessionRegister,
        private NewOrAddVisitsResolver $resolver,
        private VisitsRepository $repository,
        private VisitsPersister $persister,
        private CurrentDateFactory $dateFactory,
    ){
        $this->date = $this->dateFactory->create();
        $this->visits = $this->repository->findOneVisitsObjectByDate($this->date);
    }

    public function start(): void
    {
        if($this->sessionRegister->IsSessionRegistered() === null) {
            $this->persister->persist($this->resolver->resolve($this->visits, $this->date));
            $this->sessionRegister->register();
        }
    }

}