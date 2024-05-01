<?php

namespace App\Http\Controllers;

use App\Models\AbsenceModel;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class AbsenceController extends Controller
{
    public function store(Request $request)
    {
        try {
            $absence = AbsenceModel::create($request->all());

            return response()->json([
                'message' => 'Frånvaroanmälan skapad',
                'data' => $absence
            ], 201);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Resursen hittades inte'], 404);
        } catch (\Exception $e) {

            return response()->json(['message' => 'Ett fel uppstod: ' . $e->getMessage()], 500);
        }
    }
}
