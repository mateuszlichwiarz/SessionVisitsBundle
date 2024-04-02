<?php

declare(strict_types=1);

namespace Hume\SessionVisitsBundle\Tests\Component\VisitsFinder\Finders;

use Hume\SessionVisitsBundle\Tests\Component\VisitsFinder\TestCase\VisitsFinderKernelTestCase;

use  Hume\SessionVisitsBundle\Component\DateSystem\Model\Date;

use Hume\SessionVisitsBundle\Component\VisitsFinder\Factory\MonthVisitsFinderFactory;

final class MonthVisitsFinderTest extends VisitsFinderKernelTestCase
{
    private array $visitsFoundCollection;

    private Date $date;

    public function setUp(): void
    {
        parent::setUp();
        $this->date = $this->dateSystem->create();
        $this->setUpVisitsFound();
    }

    protected function setUpVisitsFound(): void
    {
        $monthVisitsFinderFactory = new MonthVisitsFinderFactory();
        $monthVisitsFinder = $monthVisitsFinderFactory->createFinder(
            $this->date,
            $this->visitsCollection
        );
        $this->visitsFoundCollection = $monthVisitsFinder->find();
    }

    public function testFindWeekInMonth(): void
    {
        $this->assertEquals(count($this->visitsFoundCollection), 5);
    }
}