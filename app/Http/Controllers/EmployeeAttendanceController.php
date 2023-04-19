<?php

namespace App\Http\Controllers;

use App\Models\Column;
use App\Models\Employee;
use App\Models\EmployeeAttendance;
use Illuminate\Http\Request;

class EmployeeAttendanceController extends Controller
{
    //
    public function store(Employee $employee, Column $column) {
        $employee->attendance()->create([
            "employee_id" => $employee->id,
            "column_id" => $column->id
        ]);

        return redirect()->route('index')->with('success', "{$employee->full_name} selected successfully");
    }

    public function update(EmployeeAttendance $attendance, Column $column)
    {
        // dd($employee);
        $attendance->update([
            'column_id' => $column->id
        ]);

        return  back()->with('success', "{$attendance->employee->full_name} successfully moved to {$column->name}!");
    }

    public function destroy(EmployeeAttendance $attendance){
        if($attendance->has('destination')->exists()){
            $attendance->destination->delete();
        }
        $attendance->delete();
        return back()->with('success', "{$attendance->employee->full_name} successfully removed from attendance board!");
    }
}
