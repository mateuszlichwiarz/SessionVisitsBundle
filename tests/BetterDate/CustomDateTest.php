<?php

declare(strict_types=1);

namespace App\Tests\BetterDate;

use PHPUnit\Framework\TestCase;

use App\BetterDate\Factory\CustomDateFactory;
use App\BetterDate\Entity\Date;

final class CustomDateTest extends TestCase
{
    private Date $customDate;

    public function setUp(): void
    {
        $customDateFactory = new CustomDateFactory();
        $this->customDate = $customDateFactory->create('20-02-2020');
    }

    public function testGetYear(): void
    {        
        $this->assertSame($this->customDate->getYear(), 2020);
    }

    public function testGetMonth(): void
    {        
        $this->assertSame($this->customDate->getMonth(), 2);
    }

    public function testGetWeek(): void
    {   
        $this->assertSame($this->customDate->getWeek(), 3);
    }
}