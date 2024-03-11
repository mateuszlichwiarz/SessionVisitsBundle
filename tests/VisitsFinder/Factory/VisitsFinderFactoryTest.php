<?php

declare(strict_types=1);

namespace App\Tests\VisitsFinder\Factory;

use App\Tests\VisitsFinder\TestCase\VisitsFinderKernelTestCase;

use App\BetterDate\Factory\CurrentDateFactory;
use App\BetterDate\Entity\Date;

use App\VisitsFinder\Factory\WeekVisitsFinderFactory;
use App\VisitsFinder\Finders\WeekVisitsFinder;

use App\VisitsFinder\Factory\MonthVisitsFinderFactory;
use App\VisitsFinder\Finders\MonthVisitsFinder;

use App\VisitsFinder\Factory\YearVisitsFinderFactory;
use App\VisitsFinder\Finders\YearVisitsFinder;

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