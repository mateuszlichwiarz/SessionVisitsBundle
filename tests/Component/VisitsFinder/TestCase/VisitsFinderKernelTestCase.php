<?php

declare(strict_types=1);

namespace Hume\SessionVisitsBundle\Tests\Component\VisitsFinder\TestCase;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

use Hume\SessionVisitsBundle\Repository\VisitsRepository;

use Hume\SessionVisitsBundle\Component\DateSystem\DateSystemInterface;

abstract class VisitsFinderKernelTestCase extends KernelTestCase
{
    protected ?array $visitsCollection;

    protected VisitsRepository $visitsRepository;

    protected DateSystemInterface $dateSystem;

    public function setUp(): void
    {
        self::bootKernel();
        $this->dateSystem = self::getContainer()->get(DateSystemInterface::class);
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