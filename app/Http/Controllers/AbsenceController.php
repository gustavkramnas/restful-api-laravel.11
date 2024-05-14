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


    public function store(Request $request)
    {
        try {

            // Validera och filtrera värdet av 'absence_certificate'-parametern för att se om det är sant eller falskt.
            $request->merge(['absence_certificate' => filter_var($request->input('absence_certificate'), FILTER_VALIDATE_BOOLEAN)]);


            $validatedData = $request->validate([
                'employee_id' => 'required',
                'date' => 'required|date',
                'phone_number' => 'required',
                'email' => 'required',
                'reason' => 'required',
                'absence_type' => 'required',
                'absence_percentage_level' => 'required',
                'absence_certificate' => 'boolean',
                'absence_certificate_photos' => 'array',
                'approval_by' => 'required',
                'approval_date' => 'required|date',
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