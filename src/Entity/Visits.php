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

    #[ORM\Column]
    private ?int $month = null;

    #[ORM\Column]
    private ?int $week = null;

    #[ORM\Column]
    private ?int $year = null;

    #[ORM\Column]
    private ?int $visits = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMonth(): ?int
    {
        return $this->month;
    }

    public function setMonth(int $month): static
    {
        $this->month = $month;

        return $this;
    }

    public function getWeek(): ?int
    {
        return $this->week;
    }

    public function setWeek(int $week): static
    {
        $this->week = $week;

        return $this;
    }

    public function getYear(): ?int
    {
        return $this->year;
    }

    public function setYear(int $year): static
    {
        $this->year = $year;

        return $this;
    }

    public function getVisits(): ?int
    {
        return $this->visits;
    }

    public function setVisits(int $visits): static
    {
        $this->visits = $visits;

        return $this;
    }
}
