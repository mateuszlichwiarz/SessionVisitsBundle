<?php

declare(strict_types=1);

namespace MLD\SessionVisitsBundle\DateSystem;

use MLD\SessionVisitsBundle\Entity\Date;
use MLD\SessionVisitsBundle\DateSystem\Factory\CurrentDateFactory;
use MLD\SessionVisitsBundle\DateSystem\Factory\CustomDateFactory;
use MLD\SessionVisitsBundle\DateSystem\Factory\Interface\CustomDateFactoryInterface;
use MLD\SessionVisitsBundle\DateSystem\Factory\Interface\DateFactoryInterface;

use MLD\SessionVisitsBundle\DateSystem\DateSystemInterface;

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