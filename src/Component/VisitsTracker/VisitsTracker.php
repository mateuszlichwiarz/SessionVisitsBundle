<?php

declare(strict_types=1);

namespace MLD\SessionVisitsBundle\Component\VisitsTracker;

use MLD\SessionVisitsBundle\Component\VisitsTracker\Session\SessionRegister;
use MLD\SessionVisitsBundle\Component\VisitsTracker\Resolver\VisitsSaveResolver;

class VisitsTracker
{
    public function __construct(
        private SessionRegister $sessionRegister,
        private VisitsSaveResolver $visitsRecorder,
    ){}

    public function start(): void
    {
        if($this->sessionRegister->IsSessionRegistered() === null) {
            $this->visitsRecorder->save();
            $this->sessionRegister->register();
        }
    }

}