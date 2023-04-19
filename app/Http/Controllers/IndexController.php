<?php

namespace App\Http\Controllers;

use App\Models\Column;

class IndexController extends Controller
{
    //
    public function index()
    { 
        return inertia('Index/Index', [
            'columns'=> Column::with([
                    'attendances' => function($query){
                        $query
                        // ->today()
                        // ->untilToday()
                        ->with([
                            'employee' => function($query) {
                                $query->select('position', 'id', 'full_name')->with('picture');
                            },
                            'destination'
                        ]);
                    }
                ])
                ->get()
        ]);
    }
}
