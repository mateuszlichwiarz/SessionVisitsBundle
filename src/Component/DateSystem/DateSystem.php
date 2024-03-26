<?php

declare(strict_types=1);

namespace Hume\SessionVisitsBundle\Component\DateSystem;

use Hume\SessionVisitsBundle\Entity\Date;
use Hume\SessionVisitsBundle\Component\DateSystem\Factory\CurrentDateFactory;
use Hume\SessionVisitsBundle\Component\DateSystem\Factory\CustomDateFactory;
use Hume\SessionVisitsBundle\Component\DateSystem\Factory\Interface\CustomDateFactoryInterface;
use Hume\SessionVisitsBundle\Component\DateSystem\Factory\Interface\DateFactoryInterface;

use Hume\SessionVisitsBundle\Component\DateSystem\DateSystemInterface;

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