<?php

namespace App\Http\Controllers;

use App\Models\EmployeeAttendance;
use App\Models\EmployeeAttendanceDestination;
use Illuminate\Http\Request;

class AttendanceDestinationController extends Controller
{
    
    public function create(EmployeeAttendance $attendance)
    {
        return inertia('Destination/Create', [
            'attendance' => $attendance->id
        ]);
    }
    public function store(Request $request, EmployeeAttendance $attendance)
    {
        $validatedData = $request->validate([
            'destination' => 'required|max:800|string',
            'activity' => 'required|string|max:800',
            'from' => 'date|nullable',
            'to' => 'date|nullable'
        ]);

        $attendance->destination()->create($validatedData);

        return redirect()->route('index')->with('success', 'Destination added successfully');
    }

    public function edit(EmployeeAttendanceDestination $destination)
    {
        return inertia('Destination/Edit', [
            'destination' => $destination
        ]);
    }
    public function update(Request $request, EmployeeAttendanceDestination $destination)
    {
        $validatedData = $request->validate([
            'destination' => 'required|max:800|string',
            'activity' => 'required|string|max:800',
            'from' => 'date|nullable',
            'to' => 'date|nullable'
        ]);

        $destination->update($validatedData);

        return redirect()->route('index')->with('success', 'Destination updated successfully');
    }

    public function destroy(EmployeeAttendanceDestination $destination)
    {
        $destination->delete();

        return redirect()->route('index')->with('success', 'Destination deleted successfully');
    }

}
