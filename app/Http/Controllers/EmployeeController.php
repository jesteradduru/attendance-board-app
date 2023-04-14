<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Models\EmployeePicture;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia('Employee/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'full_name' => 'required|max:255|string|unique:employees',
            'position' => 'required|string',
            'profile_picture.*' => 'required|mimes:jpeg,png,jpg',
        ], [
            'profile_picture.*.mimes' => 'File must be an image (e.g. jpg, png, jpeg)',
            'profile_picture.*.required' => 'Profile picture field is required',
        ]);
    
        // Create a new Employee instance
        $employee = new Employee([
            'full_name' => $validatedData['full_name'],
            'position' => $validatedData['position'],
        ]);

        // Save the Employee instance to the database
        $employee->save();
    
        // Save the Employee Picture
        $path = $request->file('profile_picture')[0]->store('profile_pictures', 'public');
        
        $employeePicture = new EmployeePicture([
            'employee_id' => $employee->id,
            'filename' => $path,
        ]);
        $employeePicture->save();
    
        return redirect()->back()->with('success', 'Employee has been added.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        Storage::disk('public')->delete($employee->picture->filename);
        $employee->picture()->delete();
        $employee->delete();
        return back()->with('success', 'Employee deleted');
    }
}
