<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CalculateSalaryTest extends TestCase
{
    /**
     * @test
     * @dataProvider CalculateSalaryUsingWorkedHoursAndSalaryPerHourDP
     */
    public function CalculateSalaryUsingWorkedHoursAndSalaryPerHour(float $workedHour, float $salaryPerHour, float $expectedResult, int $expectedHttpCode): void
    {
        $request = [
            'workedHours' => $workedHour,
            'salaryPerHour' => $salaryPerHour,
        ];

        $response = $this->postJson("/api/v1/calculator", $request);

        $response->assertStatus($expectedHttpCode)
                ->assertJson([
                    'salary' => $expectedResult,
                ]);
    }

    public function CalculateSalaryUsingWorkedHoursAndSalaryPerHourDP(): array
    {
        return [
            array(5,20,100,200),
            array(2,50,100,200),
            array(0,20,0,200),
            array(20,0,0,200),
            array(2.5,100,250,200),
            array(100,2.5,250,200),
            array(21.5,23,494.5,200),
            array(-1,0,-1,400)
        ];
    }
}
