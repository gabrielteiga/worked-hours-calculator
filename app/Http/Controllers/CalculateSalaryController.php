<?php

namespace App\Http\Controllers;

use App\Http\Requests\CalculateSalaryRequest;

class CalculateSalaryController extends Controller
{
    public function run(CalculateSalaryRequest $request) {
        $request->validated();

        return response()->json(
            [
                'salary' => $request->get('workedHours') * $request->get('salaryPerHour'),
            ]
        );
    }
}
