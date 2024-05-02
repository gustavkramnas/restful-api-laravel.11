<?php

namespace App\Http\Controllers;

use App\Models\AbsenceModel;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class AbsenceController extends Controller
{
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'employee_id' => 'required',
                'date' => 'required|date',
                'reason' => 'required',
                'absence_type' => 'required',
                'absence_certificate' => 'required|boolean',
                'absence_certificate_photos' => 'required|array',
                'approval_by' => 'required',
                'approval_date' => 'required|date',
                'comments' => 'required',
            ]);

            $absence = AbsenceModel::create($validatedData);

            return response()->json([
                'message' => 'Frånvaroanmälan skapad',
                'data' => $absence
            ], 201);
        } catch (ValidationException $e) {
            return response()->json(['message' => 'Ogiltig data: ' . $e->getMessage()], 422);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Ett fel uppstod: ' . $e->getMessage()], 500);
        }
    }
}
