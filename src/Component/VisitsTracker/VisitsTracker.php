<?php

declare(strict_types=1);

namespace MLD\SessionVisitsBundle\Component\VisitsTracker;

use MLD\SessionVisitsBundle\Component\VisitsTracker\Session\SessionRegister;
use MLD\SessionVisitsBundle\Component\VisitsTracker\Resolver\NewOrUpdateVisitsResolver;

class VisitsTracker
{
    public function __construct(
        private SessionRegister $sessionRegister,
        private NewOrUpdateVisitsResolver $visitsResolver,
    ){}

    public function start(): void
    {
        if($this->sessionRegister->IsSessionRegistered() === null) {
            $this->sessionRegister->register();
            $this->visitsResolver->resolve();
        }
    }

}