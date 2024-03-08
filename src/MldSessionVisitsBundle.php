<?php

declare(strict_types=1);

namespace MLD\SessionVisitsBundle;

use Symfony\Component\HttpKernel\Bundle\AbstractBundle;

class MldSessionVisitsBundle extends AbstractBundle
{
    public function getPath(): string
    {
        return dirname(path:__DIR__);
    }
}