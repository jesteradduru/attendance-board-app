<?php

namespace App\Http\Controllers;

use App\Models\Column;
use App\Models\EmployeeAttendance;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    //
    public function index()
    {  
        return inertia('Index/Index', [
            'columns'=> EmployeeAttendance::with(['column', 'employee'])->get(),
        ]);
    }
}
