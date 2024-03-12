<?php

declare(strict_types=1);

namespace MLD\SessionVisitsBundle\Tests\VisitsFinder\Factory;

use MLD\SessionVisitsBundle\Tests\VisitsFinder\TestCase\VisitsFinderKernelTestCase;

use MLD\SessionVisitsBundle\DateSystem\Factory\CurrentDateFactory;
use MLD\SessionVisitsBundle\Entity\Date;

use MLD\SessionVisitsBundle\VisitsFinder\Factory\WeekVisitsFinderFactory;
use MLD\SessionVisitsBundle\VisitsFinder\Finders\WeekVisitsFinder;

use MLD\SessionVisitsBundle\VisitsFinder\Factory\MonthVisitsFinderFactory;
use MLD\SessionVisitsBundle\VisitsFinder\Finders\MonthVisitsFinder;

use MLD\SessionVisitsBundle\VisitsFinder\Factory\YearVisitsFinderFactory;
use MLD\SessionVisitsBundle\VisitsFinder\Finders\YearVisitsFinder;

final class VisitsFinderFactoryTest extends VisitsFinderKernelTestCase
{
    private Date $date;

    public function setUp(): void
    {
        parent::setUp();
        $dateFactory = new CurrentDateFactory();
        $this->date = $dateFactory->create();
    }
    protected function setUpVisitsFound(): void
    {}

    public function testCanCreateWeekVisitsFinder(): void
    {
        $visitsFinderFactory = new WeekVisitsFinderFactory();
        $this->assertInstanceOf(
            WeekVisitsFinder::class,
            $visitsFinderFactory->createFinder(
                $this->date,
                $this->visitsCollection
            )
        );
    }

    public function testCanCreateMonthVisitsFinder(): void
    {
        $visitsFinderFactory = new MonthVisitsFinderFactory();
        $this->assertInstanceOf(
            MonthVisitsFinder::class,
            $visitsFinderFactory->createFinder(
                $this->date,
                $this->visitsCollection
            )
        );
    }

    public function testCanCreateYearVisitsFinder(): void
    {
        $visitsFinderFactory = new YearVisitsFinderFactory();
        $this->assertInstanceOf(
            YearVisitsFinder::class,
            $visitsFinderFactory->createFinder(
                $this->date,
                $this->visitsCollection
            )
        );
    }
}