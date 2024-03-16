<?php

declare(strict_types=1);

namespace MLD\SessionVisitsBundle\Tests\Component\DateSystem\TestCase;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

use MLD\SessionVisitsBundle\Component\DateSystem\DateSystemInterface;

abstract class DateSystemKernelTestCase extends KernelTestCase
{
    protected DateSystemInterface $dateSystem;

    public function setUp(): void
    {
        self::bootKernel();
        $this->dateSystem = self::getContainer()->get(DateSystemInterface::class);
    }
}