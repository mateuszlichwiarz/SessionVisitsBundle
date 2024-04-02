<?php

declare(strict_types=1);

namespace Hume\SessionVisitsBundle\tests\Component\DateSystem\Calculator\WeekCalculator;

use PHPUnit\Framework\TestCase;

use Hume\SessionVisitsBundle\Component\DateSystem\Factory\DateFactory;
use Hume\SessionVisitsBundle\Component\DateSystem\Model\Date;

final class DateFactoryTest extends TestCase
{
    public function testCreateDate(): void
    {
        $this->assertInstanceOf(
            Date::class,
            $this->createMock(DateFactory::class)->create(),
        );
    }
}