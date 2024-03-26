<?php

declare(strict_types=1);

namespace Hume\SessionVisitsBundle;

use Symfony\Component\DependencyInjection\Extension\ExtensionInterface;
use Symfony\Component\HttpKernel\Bundle\AbstractBundle;

use Hume\SessionVisitsBundle\DependencyInjection\MldSessionVisitsExtension;

class MldSessionVisitsBundle extends AbstractBundle
{
    public function getPath(): string
    {
        return dirname(path:__DIR__);
    }

    public function getContainerExtension(): ?ExtensionInterface
    {
        return new MldSessionVisitsExtension();
    }
}