<?php

declare(strict_types=1);

namespace Hume\SessionVisitsBundle\Tests\Component\DateSystem\TestCase;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

use Hume\SessionVisitsBundle\Component\DateSystem\DateSystemInterface;

abstract class DateSystemKernelTestCase extends KernelTestCase
{
    protected DateSystemInterface $dateSystem;

    public function setUp(): void
    {
        self::bootKernel();
        $this->dateSystem = self::getContainer()->get(DateSystemInterface::class);
    }
}