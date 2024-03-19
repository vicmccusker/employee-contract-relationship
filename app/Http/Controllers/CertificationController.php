<?php

namespace App\Http\Controllers;

use App\Models\Certification;

class CertificationController extends Controller
{
    public function find($id)
    {
        return response()->json([
            'message' => 'Returned',
            'data' => Certification::with(['employees:contract_id,name'])->find($id),
        ], 200);
    }
    //
}
