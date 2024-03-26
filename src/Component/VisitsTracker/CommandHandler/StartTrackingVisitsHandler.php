<?php

declare(strict_types=1);

namespace MLD\SessionVisitsBundle\Component\VisitsTracker\CommandHandler;

use MLD\SessionVisitsBundle\Component\VisitsTracker\Command\StartTrackingVisitsCommand;

class StartTrackingVisitsHandler
{
    public function __construct(
    ){}

    public function __invoke(StartTrackingVisitsCommand $command): void
    {
        
    }
}