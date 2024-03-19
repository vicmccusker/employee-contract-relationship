<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\Employee;
use Illuminate\Http\Request;

class ContractController extends Controller
{
    public function getAll()

    {
        return response()->json([
            'message' => 'employee returned',
            Contract::with(['employee:contract_id,name'])->get()
        ]);
    }

    public function create(Request $request) {

        $request->validate([
            'name' => 'required|max:30|string',
            'full_time' => 'boolean',
            'part_time' => 'boolean',
            'annual_hours' => 'integer|required',
            'contractor' => 'integer'
        ]);

        $contract = new Contract();
        $contract->name = $request->name;
        $contract->full_time = $request->full_time;
        $contract->part_time = $request->part_time;
        $contract->annual_hours = $request->annual_hours;
        $contract->contractor = $request->contractor;

        if (! $contract->save()) {
            return response('not saved');
        } else {
            return response('saved');
        }

    }

    public function update(Request $request, int $id)

    {

        $request->validate([
            'name' => 'required|max:30|string',
            'full_time' => 'required|boolean',
            'part_time' => 'required|boolean',
            'annual_hours' => 'required|integer',
            'contractor' => 'required|integer'
        ]);


        $contract = Contract::with(['employee:contract_id,name'])->find($id);

        if(!$contract) {
            return response('Not here');
        }

        $contract->name = $request->name;
        $contract->full_time = $request->full_time;
        $contract->part_time = $request->part_time;
        $contract->contractor = $request->contractor;

        if (! $contract->save()) {
            return response('not saved');
        } else {
            return response('saved');
        }
    }

    public function find($id)
    {

        return response()->json([
            'message' => 'Returned',
            'data' => Contract::with(['employee:contract_id,name'])->find($id)
        ], 200);

    }

}
