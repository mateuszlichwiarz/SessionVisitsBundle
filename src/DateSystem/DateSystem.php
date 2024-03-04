<?php

declare(strict_types=1);

namespace App\DateSystem;

use App\DateSystem\Entity\Date;
use App\DateSystem\Factory\CurrentDateFactory;
use App\DateSystem\Factory\CustomDateFactory;
use App\DateSystem\Factory\Interface\CustomDateFactoryInterface;
use App\DateSystem\Factory\Interface\DateFactoryInterface;

use App\DateSystem\BetterDateInterface;

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