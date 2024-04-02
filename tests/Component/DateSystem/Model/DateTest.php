<?php

declare(strict_types=1);

namespace Hume\SessionVisitsBundle\tests\Component\DateSystem\Calculator\WeekCalculator;

use Hume\SessionVisitsBundle\Component\DateSystem\Calculator\WeekCalculator;
use PHPUnit\Framework\TestCase;

use Hume\SessionVisitsBundle\Component\DateSystem\Factory\DateFactory;
use Hume\SessionVisitsBundle\Component\DateSystem\Model\Date;

final class DateTest extends TestCase
{
    protected Date $date;

    public function setUp(): void
    {
        $factory = new DateFactory(new WeekCalculator);
        $this->date = $factory->create('09-01-1998');
    }

    public function test_Custom_Date_Getters_Int_Type_Output(): void
    {
        $this->assertSame(9, $this->date->getDay());
        $this->assertSame(2, $this->date->getWeek());
        $this->assertSame(1, $this->date->getMonth());
        $this->assertSame(1998, $this->date->getYear());
    }
}