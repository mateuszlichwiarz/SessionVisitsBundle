<?php

declare(strict_types=1);

namespace MLD\SessionVisitsBundle\Component\VisitsTracker\CommandHandler;

use Symfony\Component\Messenger\Attribute\AsMessageHandler;
use Symfony\Component\Messenger\MessageBusInterface;

use MLD\SessionVisitsBundle\Component\DateSystem\Factory\CurrentDateFactory;
use MLD\SessionVisitsBundle\Entity\Date;

use MLD\SessionVisitsBundle\Component\VisitsTracker\Domain\Entity\Visits;
use MLD\SessionVisitsBundle\Component\VisitsTracker\Domain\Event\VisitsHaveBeenSavedEvent;
use MLD\SessionVisitsBundle\Component\VisitsTracker\Factory\VisitsFactory;
use MLD\SessionVisitsBundle\Component\VisitsTracker\Updater\VisitsUpdater;
use MLD\SessionVisitsBundle\Component\VisitsTracker\Persister\VisitsPersister;
use MLD\SessionVisitsBundle\Repository\VisitsRepository;

use MLD\SessionVisitsBundle\Component\VisitsTracker\Command\SaveVisits;


#[AsMessageHandler]
class SaveVisitsHandler
{
    private Date $date;

    private ?Visits $visits;

    public function __invoke(SaveVisits $command): void
    {
        dump($command);
    }
}