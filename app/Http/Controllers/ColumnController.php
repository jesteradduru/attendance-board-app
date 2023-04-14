<?php

namespace App\Http\Controllers;

use App\Models\Column;
use App\Models\Employee;
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
        //
        return inertia('Column/Show', [
            'column' => $column,
            'employees' => Employee::with('picture')->leftJoin('employee_attendances', 'employees.id', '=', 'employee_attendances.employee_id')
                            ->whereNull('employee_attendances.id')
                            ->select('employees.*')
                            ->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Column $column)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Column $column)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Column $column)
    {
        $column->delete();
        return back()->with('success', 'Column deleted successfully');
    }
}
