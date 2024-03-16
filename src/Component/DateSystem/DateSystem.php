<?php

declare(strict_types=1);

namespace MLD\SessionVisitsBundle\Component\DateSystem;

use MLD\SessionVisitsBundle\Entity\Date;
use MLD\SessionVisitsBundle\Component\DateSystem\Factory\CurrentDateFactory;
use MLD\SessionVisitsBundle\Component\DateSystem\Factory\CustomDateFactory;
use MLD\SessionVisitsBundle\Component\DateSystem\Factory\Interface\CustomDateFactoryInterface;
use MLD\SessionVisitsBundle\Component\DateSystem\Factory\Interface\DateFactoryInterface;

use MLD\SessionVisitsBundle\Component\DateSystem\DateSystemInterface;

class DateSystem implements DateSystemInterface
{
    public function __construct(
        private CurrentDateFactory $currentDateFactory,
        private CustomDateFactory $customDateFactory,
    ){}

    public function create(string $date = null): Date
    {
        if($date === null) {
            return $this->currentDateFactory->create();
        }else {
            return $this->customDateFactory->create($date);
        }
    }

}