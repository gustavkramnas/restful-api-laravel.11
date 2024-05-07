<?php

namespace App\Http\Controllers;

use App\Models\AbsenceModel;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class AbsenceController extends Controller
{

    public function submitAbsenceReport()
    {
        return view('layouts/create_absence_blade');
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'employee_id' => 'required',
                'date' => 'required|date',
                'reason' => 'required',
                'absence_type' => 'required',
                'absence_certificate' => 'required|boolean',
                'absence_certificate_photos' => 'array',
                'approval_by' => 'required',
                'approval_date' => 'required|date',
                'phone_number' => 'required',
                'email' => 'required',
                'comments' => 'required',
            ]);

            // Check if absence_certificate_photos array is empty
            if (empty($validatedData['absence_certificate_photos'])) {
                $validatedData['absence_certificate_photos'] = ['user did not upload any file'];
            }

            // Check for any extra attributes
            $extraAttributes = array_diff_key($request->all(), array_flip(array_keys($validatedData)));
            if (!empty($extraAttributes)) {
                throw ValidationException::withMessages(['extra_attributes' => 'Extra attribut är inte tillåtna.']);
            }

            $absence = AbsenceModel::create($validatedData);

            return response()->json([
                'message' => 'Frånvaroanmälan skapad',
                'data' => $absence
            ], 201);
        } catch (ValidationException $e) {
            $messages = ['message' => 'Ogiltig data'];

            // Använd $e->errors() för att hämta valideringsfel
            $validationErrors = $e->errors();

            if (isset($validationErrors['extra_attributes'])) {
                $messages['extra_attributes'] = $e->getMessage();
                return response()->json($messages, 422);
            } else {
                $messages['required_attributes'] = 'Obligatoriska attribut saknas: ' . $e->getMessage();
                return response()->json($messages, 422);
            }
        } catch (\Exception $e) {
            return response()->json(['message' => 'Ett fel uppstod: ' . $e->getMessage()], 500);
        }
    }
}