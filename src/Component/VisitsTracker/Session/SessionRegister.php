<?php

declare(strict_types= 1);

namespace MLD\SessionVisitsBundle\VisitsTracker\Session;

use Symfony\Component\HttpFoundation\RequestStack;

class SessionRegister
{
    public function __construct(
        private RequestStack $requestStack
    ){}

    public function register(): void
    {
        if($this->requestStack->getSession()->get('registered') === null) {
            $this->requestStack->getSession()->set('registered', true);
        }
    }

    public function IsSessionRegistered(): mixed
    {
        return $this->requestStack->getSession()->get('registered');
    }
}