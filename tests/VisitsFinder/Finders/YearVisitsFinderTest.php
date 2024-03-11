<?php

declare(strict_types=1);

namespace App\Tests\VisitsFinder\Finders;

use App\Tests\VisitsFinder\TestCase\VisitsFinderKernelTestCase;

use App\BetterDate\Entity\Date;
use App\BetterDate\Factory\CustomDateFactory;

use App\VisitsFinder\Factory\YearVisitsFinderFactory;

final class YearVisitsFinderTest extends VisitsFinderKernelTestCase
{
    private array $visitsFoundCollection;

    private Date $date;

    public function setUp(): void
    {
        parent::setUp();

        $this->date = $this->betterDate->create();
        $this->setUpVisitsFound();
    }

    protected function setUpVisitsFound(): void
    {
        $yearVisitsFinderFactory = new YearVisitsFinderFactory();
        $yearVisitsFinder = $yearVisitsFinderFactory->createFinder(
            $this->date,
            $this->visitsCollection
        );
        $this->visitsFoundCollection = $yearVisitsFinder->find();
    }

    public function testFindWeeksInYear()
    {
        $this->assertEquals(
            count($this->visitsFoundCollection),
            60
        );
    }
}