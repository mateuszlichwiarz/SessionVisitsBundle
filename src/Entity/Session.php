<?php

declare(strict_types=1);

namespace MLD\SessionVisitsBundle\Entity;

use Symfony\Component\HttpFoundation\Session\SessionInterface;

class Session
{
    private bool $registered = false;

    public function __construct(
        private SessionInterface $session,
        )
    {
        if($this->session->get('registered') === null) {
            $this->session->set('registered', false);
        }
    }

    public function getSession(): SessionInterface
    {
        return $this->session;
    }

    public function getRegistered(): bool
    {

        return $this->registered;
    }

    public function registerSession(Bool $status): void
    {
        $this->session->set('registered', true);
    }
}