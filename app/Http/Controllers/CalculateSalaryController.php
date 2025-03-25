<?php

namespace App\Http\Controllers;

use App\Domain\CalculatorService;
use App\Http\Requests\CalculateSalaryRequest;

class CalculateSalaryController extends Controller
{
    public function run(CalculateSalaryRequest $request) {
        $request->validated();

        $salary = CalculatorService::salary($request->get('workedHours'), $request->get('salaryPerHour'));

        return response()->json(
            [
                'salary' =>  $salary,
            ]
        );
    }
}
