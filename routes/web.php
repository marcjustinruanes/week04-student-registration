<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn() => redirect()->route('students.create'));
Route::resource('students', StudentController::class)->only(['index', 'create', 'store', 'show']);
