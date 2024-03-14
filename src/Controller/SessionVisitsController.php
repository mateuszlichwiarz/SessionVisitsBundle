<?php

declare(strict_types=1);

namespace MLD\SessionVisitsBundle\Controller;

use MLD\SessionVisitsBundle\VisitsTracker\VisitsRegister;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SessionVisitsController extends AbstractController
{
    public function __construct(private VisitsRegister $visitsRegister)
    {}

    public function __invoke()
    {
        return $this->visitsRegister->saveVisit();
    }
}