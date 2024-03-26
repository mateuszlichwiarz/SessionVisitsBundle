<?php

declare(strict_types=1);

namespace Hume\SessionVisitsBundle\Tests\Component\DateSystem;

use Hume\SessionVisitsBundle\Tests\Component\DateSystem\TestCase\DateSystemKernelTestCase;

use Hume\SessionVisitsBundle\Component\DateSystem\Factory\CurrentDateFactory;
use Hume\SessionVisitsBundle\Entity\Date;

class DateSystemTest extends DateSystemKernelTestCase
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
            $this->dateSystem->create()
        );
    }

    public function testCurrentDate(): void
    {
        $this->assertEquals(
            $this->dateSystem->create()->getWeek(),
            $this->properCurrentDate->getWeek()
        );
    }

    public function testCreateCustomDate(): void
    {
        $this->assertInstanceOf(
            Date::class,
            $this->dateSystem->create('14-02-2006')
        );
    }

    public function testCustomDateAsserts(): void
    {
        $date = $this->dateSystem->create('14-02-2006');
        $this->assertEquals($date->getWeek(),2);
        $this->assertEquals($date->getMonth(), 2);
        $this->assertEquals($date->getYear(), 2006);
    }
}