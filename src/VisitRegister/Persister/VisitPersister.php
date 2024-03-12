<?php

declare(strict_types=1);

namespace MLD\SessionVisitsBundle\VisitRegister\Persister;

use Doctrine\ORM\EntityManagerInterface;
use MLD\SessionVisitsBundle\Entity\Visits;


class VisitPersister
{
    public function __construct(private EntityManagerInterface $manager)
    {}

    public function persist(Visits $visits): void
    {
        $this->manager->persist($visits);
        $this->manager->flush();
    }

    public function remove(Visits $visits): void
    {
        $this->manager->remove($visits);
        $this->manager->flush();
    }
}