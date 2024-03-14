<?php

declare(strict_types=1);

namespace MLD\SessionVisitsBundle\Controller;

use MLD\SessionVisitsBundle\VisitsTracker\VisitsRegister;

class SessionVisitsController
{
    public function __construct(private VisitsRegister $visitsRegister)
    {}

    public function __invoke()
    {
        return $this->visitsRegister->saveVisit();
    }
}