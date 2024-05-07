<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AbsenceController;


Route::get('/', [AbsenceController::class, 'submitAbsenceReport']);
