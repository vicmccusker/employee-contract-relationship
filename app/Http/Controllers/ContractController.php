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
            Contract::with(['employee:contract_id'])->get()
        ]);
    }

}
