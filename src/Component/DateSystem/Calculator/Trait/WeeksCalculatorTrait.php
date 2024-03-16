<?php

declare(strict_types=1);

namespace MLD\SessionVisitsBundle\Component\DateSystem\Calculator\Trait;

trait WeeksCalculatorTrait
{
    public function calculateWeek(int $day): int
    {
        if($day > 0 && $day  <= 7){
            return 1;
        }elseif($day > 7 && $day <= 14){
            return 2;
        }elseif($day > 14 && $day <= 21){
            return 3;
        }elseif($day > 21 && $day <= 28){
            return 4;
        }elseif($day > 28 && $day <= 31){
            return 5;
        }else{
            throw new \Exception('fatal error');
        }
    }
}