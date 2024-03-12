<?php

declare(strict_types=1);

namespace MLD\SessionVisitsBundle\Tests\VisitsFinder\TestCase;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

use MLD\SessionVisitsBundle\Repository\VisitsRepository;

use MLD\SessionVisitsBundle\dateSystem\dateSystemInterface;

abstract class VisitsFinderKernelTestCase extends KernelTestCase
{
    protected ?array $visitsCollection;

    protected VisitsRepository $visitsRepository;

    protected dateSystemInterface $dateSystem;

    public function setUp(): void
    {
        self::bootKernel();
        $this->dateSystem = self::getContainer()->get(dateSystemInterface::class);
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