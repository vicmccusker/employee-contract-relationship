<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\PokemonCard;
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

    public function create(Request $request)

    {

        $request->validate([
            'name' => 'required|max:30|string',
            'age' => 'required|integer',
            'start_date' => 'required|date',
            'contract_id' => 'required|integer|exists:contracts,id'
        ]);

        $employee = new Employee();
        $employee->name = $request->name;
        $employee->age = $request->age;
        $employee->start_date = $request->start_date;
        $employee->contract_id = $request->contract_id;

        if (! $employee->save()) {
            return response('not saved');
        } else {
            return response('saved');
        }
    }

    public function update(Request $request, int $id)

    {

        $request->validate([
            'name' => 'required|max:30|string',
            'age' => 'required|integer',
            'start_date' => 'required|date',
            'contract_id' => 'required|integer|exists:contracts,id'
        ]);

        $employee = Employee::find($id);

        if(!$employee) {
            return response('Not here');
        }

        $employee->name = $request->name;
        $employee->age = $request->age;
        $employee->start_date = $request->start_date;
        $employee->contract_id = $request->contract_id;

        if (! $employee->save()) {
            return response('not saved');
        } else {
            return response('saved');
        }
    }

    public function find($id)
    {

        return response()->json([
            'message' => 'Returned',
            'data' => Employee::find($id),
        ], 200);

    }

    public function delete(int $id)
    {

        $employee = Employee::find($id);

        if (! $employee) {
            return response()->json([
                'message' => 'Error invalid employee',
            ], 400);
        }

        $employee->delete();

        return response()->json([
            'message' => 'deleted',
        ], 200);
    }
}
