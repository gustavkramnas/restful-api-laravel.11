<?php

namespace App\Http\Controllers;

use App\Models\AbsenceModel;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class AbsenceController extends Controller
{

    public function submitAbsenceReport()
    {
        return view('pages/create_absence_blade');
    }

    public function showSubmittedAbsenceReport($id)
    {
        $absence = AbsenceModel::findOrFail($id);
        return view('pages/submitted_absence_report', ['absence' => $absence]);
    }

    public function showAbsenceReportError()
    {
        return response()->json(['error' => 'Kan inte hitta något rapport ID'], 404);
    }


    public function store(Request $request)
    {
        try {
            // Validera och filtrera värdet av 'absence_certificate'-parametern för att se om det är sant eller falskt.
            $request->merge(['absence_certificate' => filter_var($request->input('absence_certificate'), FILTER_VALIDATE_BOOLEAN)]);

            $validatedData = $request->validate([
                'employee_id' => 'required',
                'start_date' => 'required|date',
                'end_date' => 'required|date',
                'phone_number' => 'required',
                'email' => 'required',
                'reason' => 'required',
                'absence_type' => 'required',
                'absence_percentage_level' => 'required',
                'absence_certificate' => 'boolean',
                'approval_by' => 'required',
                'approval_date' => 'required|date',
                'comments' => 'required',
            ]);

            // Skapa frånvaron med de validerade uppgifterna och lagra den i databasen.
            $absence = AbsenceModel::create($validatedData);

            // Omdirigera användaren till en sida för att visa den skapade rapporten.
            return redirect()->route('showSubmittedAbsenceReport', ['id' => $absence->id]);

        } catch (ValidationException $e) {
            // Hantera valideringsfel
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
