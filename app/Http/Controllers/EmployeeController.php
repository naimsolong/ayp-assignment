<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class EmployeeController extends Controller
{
    public function dashboard()
    {
        return Inertia::render('Employee/Dashboard');
    }
    
    public function submit()
    {
        return Inertia::render('Employee/Submit');
    }
}
