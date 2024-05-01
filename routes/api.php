<?php

use App\Http\Controllers\AbsenceController;

Route::post('/absences', [AbsenceController::class, 'store']);
