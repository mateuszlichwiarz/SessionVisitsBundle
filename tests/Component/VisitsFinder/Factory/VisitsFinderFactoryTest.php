<?php

declare(strict_types=1);

namespace Hume\SessionVisitsBundle\Tests\Component\VisitsFinder\Factory;

use Hume\SessionVisitsBundle\Tests\Component\VisitsFinder\TestCase\VisitsFinderKernelTestCase;

use Hume\SessionVisitsBundle\Component\DateSystem\Factory\CurrentDateFactory;
use  Hume\SessionVisitsBundle\Component\DateSystem\Model\Date;

use Hume\SessionVisitsBundle\Component\VisitsFinder\Factory\WeekVisitsFinderFactory;
use Hume\SessionVisitsBundle\Component\VisitsFinder\Finders\WeekVisitsFinder;

use Hume\SessionVisitsBundle\Component\VisitsFinder\Factory\MonthVisitsFinderFactory;
use Hume\SessionVisitsBundle\Component\VisitsFinder\Finders\MonthVisitsFinder;

use Hume\SessionVisitsBundle\Component\VisitsFinder\Factory\YearVisitsFinderFactory;
use Hume\SessionVisitsBundle\Component\VisitsFinder\Finders\YearVisitsFinder;

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