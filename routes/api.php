<?php

use App\Http\Controllers\AbsenceController;
use Illuminate\Support\Facades\Route;

// Api routes
Route::post('/absences', [AbsenceController::class, 'store'])->name('absences');


