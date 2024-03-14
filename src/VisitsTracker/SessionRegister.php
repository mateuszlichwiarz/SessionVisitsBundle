<?php

declare(strict_types= 1);

namespace MLD\SessionVisitsBundle\VisitsTracker;

use Symfony\Component\HttpFoundation\RequestStack;

class SessionRegister
{
    public function __construct(
        private RequestStack $requestStack
    ){}

    public function register(): void
    {
        $this->requestStack->getSession()->set('registered', true);
    }
}