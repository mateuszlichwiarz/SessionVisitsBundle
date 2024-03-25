<?php

declare(strict_types=1);

namespace MLD\SessionVisitsBundle\Entity;

use MLD\SessionVisitsBundle\Repository\VisitsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VisitsRepository::class)]
class Visits
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    public function __construct(
        #[ORM\Column]
        protected ?int $month = null,
        #[ORM\Column]
        protected ?int $week = null,
        #[ORM\Column]
        protected ?int $year = null,
        #[ORM\Column]
        protected ?int $visits = null,
    ){}

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMonth(): ?int
    {
        return $this->month;
    }

    public function getWeek(): ?int
    {
        return $this->week;
    }

    public function getYear(): ?int
    {
        return $this->year;
    }

    public function getVisits(): ?int
    {
        return $this->visits;
    }

    public function addVisitsAmount(int $amount): void
    {
        $this->visits = $this->getVisits() + $amount;
    }
}
