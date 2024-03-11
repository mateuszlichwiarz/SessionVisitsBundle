<?php

declare(strict_types=1);

namespace MLD\SessionVisitsBundle;

use MLD\SessionVisitsBundle\Entity\Date;
use MLD\SessionVisitsBundle\Factory\CurrentDateFactory;
use MLD\SessionVisitsBundle\Factory\CustomDateFactory;
use MLD\SessionVisitsBundle\Factory\Interface\CustomDateFactoryInterface;
use MLD\SessionVisitsBundle\Factory\Interface\DateFactoryInterface;

use MLD\SessionVisitsBundle\DateSystemInterface;

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