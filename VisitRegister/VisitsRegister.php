<?php

declare(strict_types=1);

namespace App\VisitRegister;

use Symfony\Component\HttpFoundation\RequestStack;

use App\VisitRegister\SessionRegister;
use App\VisitRegister\VisitsRecorder;

class VisitsRegister
{
    public function __construct(
        private RequestStack $requestStack,
        private SessionRegister $sessionRegister,
        private VisitsRecorder $visitsRecorder,
    ){}

    public function saveVisit(): void
    {
        if($this->getSessionRegistered() === null) {
            $this->visitsRecorder->saveVisit();
            $this->sessionRegister->register();
        }
    }

    public function getSessionRegistered(): mixed
    {
        return $this->requestStack->getSession()->get('registered');
    }

}