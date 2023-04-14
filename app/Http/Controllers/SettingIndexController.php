<?php

namespace App\Http\Controllers;

use App\Models\Column;
use App\Models\Employee;
use Illuminate\Http\Request;

class SettingIndexController extends Controller
{
    //
    public function index()
    {
        $employees = Employee::all();
        $employees->load(['picture']);
        return inertia('Setting/Index', [
            'columns'=> Column::all(),
            "employees" =>  $employees
        ]);
    }
}
