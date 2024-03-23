<?php

declare(strict_types=1);

namespace MLD\SessionVisitsBundle\Component\VisitsTracker\Domain\Event\Subscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ControllerEvent;
use Symfony\Component\HttpKernel\KernelEvents;

use MLD\SessionVisitsBundle\Component\VisitsTracker\Controller\VisitsTrackableController;
use MLD\SessionVisitsBundle\Component\VisitsTracker\VisitsTracker;

class VisitsTrackerSubscriber implements EventSubscriberInterface
{

    private array $sessions;

    public function __construct(private VisitsTracker $visitsTracker)
    {}

    public function onKernelController(ControllerEvent $event): void
    {
        $controller = $event->getController();

        if(is_array($controller)) {
            $controller = $controller[0];
        }

        if($controller instanceof VisitsTrackableController) {
            $this->visitsTracker->start();
        }
    }

    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::CONTROLLER => 'onKernelController',
        ];
    }
}