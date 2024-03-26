<?php

declare(strict_types=1);

namespace Hume\SessionVisitsBundle\Component\VisitsTracker;

use Hume\SessionVisitsBundle\Component\VisitsTracker\Session\SessionRegister;
use Hume\SessionVisitsBundle\Component\VisitsTracker\Resolver\NewOrAddVisitsResolver;
use Hume\SessionVisitsBundle\Component\VisitsTracker\Persister\VisitsPersister;
use Hume\SessionVisitsBundle\Component\DateSystem\Factory\CurrentDateFactory;
use Hume\SessionVisitsBundle\Repository\VisitsRepository;

use Hume\SessionVisitsBundle\Entity\Visits;
use Hume\SessionVisitsBundle\Entity\Date;

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