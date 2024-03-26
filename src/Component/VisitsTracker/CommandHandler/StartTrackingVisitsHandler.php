<?php

declare(strict_types=1);

namespace Hume\SessionVisitsBundle\Component\VisitsTracker\CommandHandler;

use Hume\SessionVisitsBundle\Component\VisitsTracker\Command\StartTrackingVisitsCommand;

class StartTrackingVisitsHandler
{
    public function __construct(
    ){}

    public function __invoke(StartTrackingVisitsCommand $command): void
    {
        
    }
}