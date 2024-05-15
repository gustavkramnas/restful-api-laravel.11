<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AbsenceController;

// Web routes
Route::get('/', [AbsenceController::class, 'submitAbsenceReport']);

Route::get('/submittedAbsenceReport/{id}', [AbsenceController::class, 'showSubmittedAbsenceReport'])->name('showSubmittedAbsenceReport');


