<?php

declare(strict_types=1);

namespace Hume\SessionVisitsBundle\Tests\Component\VisitsFinder\Finders;

use Hume\SessionVisitsBundle\Tests\Component\VisitsFinder\TestCase\VisitsFinderKernelTestCase;

use  Hume\SessionVisitsBundle\Component\DateSystem\Model\Date;

use Hume\SessionVisitsBundle\Entity\Visits;
use Hume\SessionVisitsBundle\Component\VisitsFinder\Factory\WeekVisitsFinderFactory;

final class WeekVisitsFinderTest extends VisitsFinderKernelTestCase
{
    private Visits $visitsFound;

    private Visits $properVisits;

    private Date $date;

    public function setUp(): void
    {
        parent::setUp();

        $this->date = $this->dateSystem->create();
        $this->setUpVisitsFound();
        $this->setUpProperVisits();
    }

    protected function setUpVisitsFound(): void
    {
        $weekVisitsFinderFactory = new WeekVisitsFinderFactory();
        $weekVisitsFinder = $weekVisitsFinderFactory->createFinder(
            $this->date,
            $this->visitsCollection
        );

        $this->visitsFound = $weekVisitsFinder->find();
    }

    protected function setUpProperVisits(): void
    {
        $this->properVisits = new Visits();
        $this->properVisits
            ->setWeek($this->date->getWeek())
            ->setMonth($this->date->getMonth())
            ->setYear($this->date->getYear());
    }

    public function testWeekFinderAssertYear(): void
    {
        $this->assertSame(
            $this->visitsFound->getYear(),
            $this->properVisits->getYear()
        );
    }

    public function testWeekFinderAssertMonth(): void
    {
        $this->assertSame(
            $this->visitsFound->getMonth(),
            $this->properVisits->getMonth()
        );
    }

    public function testWeekFinderAssertWeek(): void
    {
        $this->assertSame(
            $this->visitsFound->getWeek(),
            $this->properVisits->getWeek()
        );
    }
}