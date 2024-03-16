<?php

declare(strict_types=1);

namespace MLD\SessionVisitsBundle\Tests\Component\DateSystem;

use MLD\SessionVisitsBundle\Tests\Component\DateSystem\TestCase\DateSystemKernelTestCase;

use MLD\SessionVisitsBundle\Component\DateSystem\Factory\CurrentDateFactory;
use MLD\SessionVisitsBundle\Entity\Date;

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