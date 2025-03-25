<?php

namespace App\Domain;

class CalculatorService {
    public static function salary(float $workedHours, float $salaryPerHour): float
    {
        return $workedHours * $salaryPerHour;
    }
}
