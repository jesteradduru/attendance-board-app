<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Column;
use App\Models\Employee;
use App\Models\EmployeeAttendance;
use Illuminate\Http\Request;

class ColumnController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return inertia('Column/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Column::create(
            $request->validate([
                'name' => 'string|required|max:30'
            ])
        );

        return redirect()->back()->with('success', 'Column added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Column $column)
    {
        return inertia('Column/Show', [
            'column' => $column,
            'employees' =>  Employee::leftJoin('employee_attendances', function ($join) {
                                $join->on('employees.id', '=', 'employee_attendances.employee_id');
                            })
                            ->leftJoin('employee_pictures', 'employees.id', '=', 'employee_pictures.employee_id')
                            ->whereNull('employee_attendances.id')
                            ->select('employees.*')
                            ->with('picture')
                            ->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Column $column)
    {
        //
        return inertia('Column/Edit', [
            'column' => $column
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Column $column)
    {
        //
        $valdatedData = $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $column->update([
            'name' => $valdatedData['name']
        ]);

        return redirect()->route('settings.index')->with('success', 'Column updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Column $column)
    {
        $this->authorize('delete');
        $column->delete();
        return back()->with('success', 'Column deleted successfully');
    }
}
