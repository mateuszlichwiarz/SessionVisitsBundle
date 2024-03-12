<?php

declare(strict_types=1);

namespace MLD\SessionVisitsBundle\Tests\BetterDate\TestCase;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

use MLD\SessionVisitsBundle\BetterDateInterface;

abstract class BetterDateKernelTestCase extends KernelTestCase
{
    protected BetterDateInterface $betterDate;

    public function setUp(): void
    {
        self::bootKernel();
        $this->betterDate = self::getContainer()->get(BetterDateInterface::class);
    }
}