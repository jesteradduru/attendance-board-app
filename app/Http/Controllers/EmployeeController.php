<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Models\EmployeePicture;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    public function create()
    {
        return inertia('Employee/Create');
    }

    public function store(Request $request)
    {
        // dd($request->hasFile('profile_picture'));
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

    public function edit(Employee $employee)
    {
        //
        return inertia('Employee/Edit', [
            'employee' => $employee->load('picture')
        ]);
    }

    public function update(Request $request, Employee $employee)
    {
        // Save the Employee instance to the database
        $employee->update($request->validate([
            'full_name' => 'max:255|string',
            'position' => 'string',
        ]));
    
        // Save the Employee Picture
        if($request->hasFile('profile_picture')){
            Storage::disk('public')->delete($employee->picture->filename);
            $path = $request->file('profile_picture')[0]->store('profile_pictures', 'public');
            
            $employee->picture->update([
                'employee_id' => $employee->id,
                'filename' => $path,
            ]);
        }
    
        return redirect()->back()->with('success', 'Employee has been added.');
    }

    public function destroy(Employee $employee)
    {
        $this->authorize('delete');
        
        if(!$employee->has('attendance')->exists()){
            $employee->picture()->delete();
            $employee->delete();
            Storage::disk('public')->delete($employee->picture->filename);
            return back()->with('success', 'Employee deleted');
        }
    }
}
