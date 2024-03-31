# SessionVisitsBundle

Hello, this bundle is my idea how visits should be counted and stored in database.

SessionVisitsBundle register visit by session and flush to database.
Bundle track visits, process and store week, month, year visits in database.

## Contain Components
- VisitsTracker
- VisitsFinder
- DateSystem

#
#
> [!WARNING]
> At this moment it's only sandbox in which I throw my new skills and ideas so I don't recommend use it in production.

#
#

## Installation

SessionVisitsBundle requires [php8.2](https://www.php.net/), [Symfony7](https://www.symfony.com/), [Doctrine-bundle2.12](https://www.php.net/) to run.
Make sure Composer is installed on your machine.

You can install it via Composer:
``` sh
composer require hume/session-visits-bundle:dev-main
```
#
#
Just in case, check this line at config/bundle.php is identical:
``` php
<?php
// config/bundles.php
Hume\SessionVisitsBundle\HumeSessionVisitsBundle::class => ['dev' => true, 'test' => true],
```
#
> [!NOTE]
> Or just set ['all' => true] if for anybody it useful in production but as I said it is not recommended.
#
#

## Basic Usage
You have to just tag Controller in which you want tracking visits.
``` php
<?php
// src/Controller/ExampleController.php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Hume\SessionVisitsBundle\Controller\VisitsTrackableController;

class ExampleController implements VisitsTrackableController
{
    public function indexAction(): Response
    {
        return new Response('Hello world!')
    }
}
```

And that's it! Your controller is listened by VisitsTracker subscriber kernel.controller.
#
#
> [!TIP]
> If you want more about how exactly events listners and subscribers works check this out:
> https://symfony.com/doc/current/event_dispatcher.html
#
#

## Or
Classic dependency injection:
``` php
<?php
// src/Controller/ExampleController.php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Hume\SessionVisitsBundle\Component\VisitsTracker\VisitsTracker;

class ExampleController
{
    public function __construct(private visitsTracker $visitsTracker)
    {
        $visitsTracker->start();
    }
    
    public function indexAction(VisitsTracker $visitsTracker): Response
    {
        return new Response('Hello world!')
    }
}
```

## Fetching Visits from Database

Session Visits Bundle use Doctrine-Bundle for database operations.
Recommended is using Repository to fetch visits objects.

> [!IMPORTANT]
> Check find and sum methods in [Visits Repository](src/Repository/VisitsRepositry.php)
> Check visits model in [Visits Entity](src/Entity/Visits.php)

Repository:
``` php
use Hume\VisitsSessionBundle\Repository\VisitsRepository;
```
#
#

## DateSystem
#
> [!CAUTION]
> Section under construction.


## License

MIT
