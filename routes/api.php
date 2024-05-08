<?php

use App\Http\Controllers\AbsenceController;
use Illuminate\Support\Facades\Route;

Route::post('/absences', [AbsenceController::class, 'store'])->name('absences');

Route::get('/', [AbsenceController::class, 'create_absence_blade']);

