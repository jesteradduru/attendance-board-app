<?php

namespace App\Http\Controllers;

use App\Models\Column;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeAttendanceController extends Controller
{
    //
    public function store(Employee $employee, Column $column) {
        $employee->attendance()->create([
            "employee_id" => $employee->id,
            "column_id" => $column->id
        ]);

        return back()->with('success', "Employee selected successfully");
    }
}
