<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;



Route::middleware(['auth', "role:student"])->group(function () {
    Route::get("student", [StudentController::class, 'index'])->name("student.index");
    Route::post("student/{course}", [StudentController::class, 'store'])->name("student.store");
    Route::get("student/{enrollment}", [StudentController::class, 'show'])->name("student.show");
});