<?php

declare(strict_types=1);

namespace App\Tests\VisitsFinder;

use App\Tests\VisitsFinder\TestCase\VisitsFinderKernelTestCase;

use App\BetterDate\Entity\Date;

use App\VisitsFinder\VisitsFinderInterface;
use App\Entity\Visits;

final class VisitsFinderTest extends VisitsFinderKernelTestCase
{
    private VisitsFinderInterface $visitsFinder;

    private Visits $properVisitsCurrent;

    private Visits $properVisitsCustom;

    private Date $currentDate;

    private Date $customDate;

    public function setUp(): void
    {
        parent::setUp();
        $this->currentDate = $this->betterDate->create();
        $this->customDate = $this->betterDate->create('14-02-2024');
        $this->setUpProperVisits();
        $this->setUpVisitsFound();
    }

    private function setUpProperVisits(): void
    {
        $this->properVisitsCurrent = new Visits();
        $this->properVisitsCurrent
            ->setWeek($this->currentDate->getWeek())
            ->setMonth($this->currentDate->getMonth())
            ->setYear($this->currentDate->getYear())
            ;
        
        $this->properVisitsCustom = new Visits();
        $this->properVisitsCustom
            ->setWeek($this->customDate->getWeek())
            ->setMonth($this->customDate->getMonth())
            ->setYear($this->customDate->getYear())
            ;
    }

    protected function setUpVisitsFound(): void
    {
        $this->visitsFinder = self::getContainer()->get(VisitsFinderInterface::class);
        $this->visitsFinder->prepare($this->visitsCollection);
    }

    public function testCurrentVisitsFinderWeek(): void
    {
        $visits = $this->visitsFinder->findWeek($this->currentDate);

        $this->assertSame(
            $visits->getWeek(),
            $this->properVisitsCurrent->getWeek()
        );
        $this->assertSame(
            $visits->getMonth(),
            $this->properVisitsCurrent->getMonth()
        );
        $this->assertSame(
            $visits->getYear(),
            $this->properVisitsCurrent->getYear()
        );
    }

    public function testCurrentWeeksInVisitsFinder(): void
    {
        $this->assertEquals(
            count($this->visitsFinder->findMonth($this->currentDate)),
            5
        );
        $this->assertEquals(
            count($this->visitsFinder->findYear($this->currentDate)),
            60
        );
    }

    public function testCustomVisitsFinderWeek(): void
    {
        $visits = $this->visitsFinder->findWeek($this->customDate);

        $this->assertSame(
            $visits->getWeek(),
            $this->properVisitsCustom->getWeek()
        );
        $this->assertSame(
            $visits->getMonth(),
            $this->properVisitsCustom->getMonth()
        );
        $this->assertSame(
            $visits->getYear(),
            $this->properVisitsCustom->getYear()
        );
    }

    public function testCustomWeeksInVisitsFinder(): void
    {
        $this->assertEquals(
            count($this->visitsFinder->findMonth($this->customDate)),
            5
        );
        $this->assertEquals(
            count($this->visitsFinder->findYear($this->customDate)),
            60
        );
    }
}