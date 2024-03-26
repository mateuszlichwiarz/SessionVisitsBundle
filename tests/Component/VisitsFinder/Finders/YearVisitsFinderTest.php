<?php

declare(strict_types=1);

namespace Hume\SessionVisitsBundle\Tests\Component\VisitsFinder\Finders;

use Hume\SessionVisitsBundle\Tests\Component\VisitsFinder\TestCase\VisitsFinderKernelTestCase;

use Hume\SessionVisitsBundle\Entity\Date;
use Hume\SessionVisitsBundle\Factory\CustomDateFactory;

use Hume\SessionVisitsBundle\Component\VisitsFinder\Factory\YearVisitsFinderFactory;

final class YearVisitsFinderTest extends VisitsFinderKernelTestCase
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