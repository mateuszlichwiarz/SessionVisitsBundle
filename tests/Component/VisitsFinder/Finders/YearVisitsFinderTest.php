<?php

declare(strict_types=1);

namespace MLD\SessionVisitsBundle\Tests\Component\VisitsFinder\Finders;

use MLD\SessionVisitsBundle\Tests\Component\VisitsFinder\TestCase\VisitsFinderKernelTestCase;

use MLD\SessionVisitsBundle\Entity\Date;
use MLD\SessionVisitsBundle\Factory\CustomDateFactory;

use MLD\SessionVisitsBundle\Component\VisitsFinder\Factory\YearVisitsFinderFactory;

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