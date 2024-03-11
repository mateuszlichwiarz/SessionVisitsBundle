<?php

declare(strict_types=1);

namespace MLD\SessionVisitsBundle\Tests\BetterDate\Factory;

use PHPUnit\Framework\TestCase;

use App\BetterDate\Factory\CustomDateFactory;
use App\BetterDate\Factory\CurrentDateFactory;
use App\BetterDate\Entity\Date;

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