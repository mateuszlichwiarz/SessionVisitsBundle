<?php

declare(strict_types=1);

namespace MLD\SessionVisitsBundle\VisitsTracker;

use MLD\SessionVisitsBundle\VisitsTracker\Session\SessionRegister;
use MLD\SessionVisitsBundle\VisitsTracker\Resolver\VisitsSaveResolver;

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