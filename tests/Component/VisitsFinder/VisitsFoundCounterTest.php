<?php

declare(strict_types=1);

namespace Hume\SessionVisitsBundle\Tests\Component\VisitsFinder;

use Hume\SessionVisitsBundle\Tests\Component\VisitsFinder\TestCase\VisitsFinderKernelTestCase;

use Hume\SessionVisitsBundle\Entity\Date;

use Hume\SessionVisitsBundle\Component\VisitsFinder\VisitsFinderInterface;
use Hume\SessionVisitsBundle\Component\VisitsFinder\VisitsFoundCounter;
use Hume\SessionVisitsBundle\Entity\Visits;

use Hume\SessionVisitsBundle\Repository\VisitsRepository;

class VisitsFoundCounterTest extends VisitsFinderKernelTestCase
{
    private array $monthVisitsFound;

    private array $yearVisitsFound;

    private int $properMonthVisitsCount;

    private int $properYearVisitsCount;

    private Date $date;

    private VisitsFoundCounter $visitsFoundCounter;

    public function setUp(): void
    {
        parent::setUp();
        $this->date = $this->dateSystem->create('01-01-2022');
        $this->setUpProperVisitsCount();
        $this->setUpVisitsFound();

        $this->visitsFoundCounter = new VisitsFoundCounter();
    }

    protected function setUpVisitsFound(): void
    {
        $visitsFinder = self::getContainer()->get(VisitsFinderInterface::class);
        $visitsFinder->prepare($this->visitsCollection);
        $this->monthVisitsFound = $visitsFinder->findMonth($this->date);
        $this->yearVisitsFound = $visitsFinder->findYear($this->date);
    }

    private function setUpProperVisitsCount(): void
    {
        $visitsRepository = self::getContainer()->get(VisitsRepository::class);
        $this->properMonthVisitsCount = $visitsRepository->sumMonthVisits($this->date);
        $this->properYearVisitsCount = $visitsRepository->sumYearVisits($this->date);
    }

    public function testCountMonthVisitsFound(): void
    {
        $this->assertEquals(
            $this->visitsFoundCounter->count($this->monthVisitsFound),
            $this->properMonthVisitsCount
        );
    }

    public function testCountYearVisitsFound(): void
    {
        $this->assertEquals(
            $this->visitsFoundCounter->count($this->yearVisitsFound),
            $this->properYearVisitsCount,
        );
    }
}