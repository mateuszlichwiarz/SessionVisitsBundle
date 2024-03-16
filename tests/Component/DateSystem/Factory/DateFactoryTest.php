<?php

declare(strict_types=1);

namespace MLD\SessionVisitsBundle\Tests\Component\DateSystem\Factory;

use PHPUnit\Framework\TestCase;

use MLD\SessionVisitsBundle\Component\DateSystem\Factory\CustomDateFactory;
use MLD\SessionVisitsBundle\Component\DateSystem\Factory\CurrentDateFactory;
use MLD\SessionVisitsBundle\Entity\Date;

final class DateFactoryTest extends TestCase
{
    public function testCanCreateCustomDateFactory(): void
    {
        $customDateFactory = new CustomDateFactory();
        $this->assertInstanceOf(
            Date::class,
            $customDateFactory->create('20-12-2020')
        );
    }

    public function testCanCreateCurrentDateFactory(): void
    {
        $currentDateFactory = new CurrentDateFactory();
        $this->assertInstanceOf(
            Date::class,
            $currentDateFactory->create()
        );
    }

    /*
    public function testExpectExceptionCustomDateFactory(): void
    {
        $customDateFactory = new CustomDateFactory();

        $this->expectException(\Exception::class);
        $customDateFactory->create();
    }
    */
}