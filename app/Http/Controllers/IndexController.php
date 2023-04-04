<?php

namespace App\Http\Controllers;

use App\Models\Column;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    //
    public function index()
    {
        return inertia('Index/Index', [
            'columns'=> Column::all()
        ]);
    }
}
