<?php

namespace App\Http\Controllers;

use App\Models\Certification;
use Illuminate\Http\Request;

class CertificationController extends Controller
{
    public function find($id)
    {
        return response()->json([
            'message' => 'Returned',
            'data' => Certification::with(['employees:id,name'])->find($id),
        ], 200);
    }

    public function get()
    {
        return response()->json([
            'message' => 'Returned',
            'data' => Certification::all(),
        ], 200);
    }

    public function create(Request $request)
    {

        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
        ]);

        $certificate = new Certification();
        $certificate->name = $request->name;
        $certificate->description = $request->description;

        if (! $certificate->save()) {
            return response()->json(['message' => 'Could not create product']);
        }

            return response()->json(['message' => 'product created']);
    }
}
