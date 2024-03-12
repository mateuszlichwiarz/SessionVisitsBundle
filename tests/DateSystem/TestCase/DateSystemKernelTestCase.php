<?php

declare(strict_types=1);

namespace MLD\SessionVisitsBundle\Tests\DateSystem\TestCase;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

use MLD\SessionVisitsBundle\DateSystem\DateSystemInterface;

abstract class DateSystemKernelTestCase extends KernelTestCase
{
    protected DateSystemInterface $dateSystem;

    public function setUp(): void
    {
        self::bootKernel();
        $this->dateSystem = self::getContainer()->get(DateSystemInterface::class);
    }
}