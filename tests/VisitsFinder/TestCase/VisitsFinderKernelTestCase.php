<?php

declare(strict_types=1);

namespace App\Tests\VisitsFinder\TestCase;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

use App\Repository\VisitsRepository;

use App\BetterDate\BetterDateInterface;

abstract class VisitsFinderKernelTestCase extends KernelTestCase
{
    protected ?array $visitsCollection;

    protected VisitsRepository $visitsRepository;

    protected BetterDateInterface $betterDate;

    public function setUp(): void
    {
        self::bootKernel();
        $this->betterDate = self::getContainer()->get(BetterDateInterface::class);
        $this->setUpVisitsRepository();
        $this->setUpVisitsCollection();
    }

    abstract protected function setUpVisitsFound(): void;
    
    protected function setUpVisitsRepository(): void
    {
        $this->visitsRepository = self::getContainer()->get(VisitsRepository::class);
    }

    protected function setUpVisitsCollection(): void
    {
        $this->visitsCollection = $this->visitsRepository->findAll();
    }
}