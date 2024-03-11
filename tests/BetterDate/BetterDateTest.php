<?php

declare(strict_types=1);

namespace App\Tests\BetterDate;

use App\Tests\BetterDate\TestCase\BetterDateKernelTestCase;

use App\BetterDate\Factory\CurrentDateFactory;
use App\BetterDate\Entity\Date;

class BetterDateTest extends BetterDateKernelTestCase
{
    private Date $properCurrentDate;

    public function setUp(): void
    {
        parent::setUp();
        $this->properCurrentDate = self::getContainer()->get(CurrentDateFactory::class)->create();
    }

    public function testCreateCurrentDate(): void
    {
        $this->assertInstanceOf(
            Date::class,
            $this->betterDate->create()
        );
    }

    public function testCurrentDate(): void
    {
        $this->assertEquals(
            $this->betterDate->create()->getWeek(),
            $this->properCurrentDate->getWeek()
        );
    }

    public function testCreateCustomDate(): void
    {
        $this->assertInstanceOf(
            Date::class,
            $this->betterDate->create('14-02-2006')
        );
    }

    public function testCustomDateAsserts(): void
    {
        $date = $this->betterDate->create('14-02-2006');
        $this->assertEquals($date->getWeek(),2);
        $this->assertEquals($date->getMonth(), 2);
        $this->assertEquals($date->getYear(), 2006);
    }
}