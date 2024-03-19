<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function getAll()

    {
        return response()->json([
            'message' => 'employee returned',
             Employee::with(['contract:id,name'])->get()
            ]);
    }
}
