<?php

use App\Http\Controllers\{StudentController, CourseReviewController};
use Illuminate\Support\Facades\Route;



Route::middleware(['auth' ])->group(function () {
    Route::get("student", [StudentController::class, 'index'])->name("student.index");
    Route::post("student/{course}", [StudentController::class, 'store'])->name("student.store");
    Route::get("student/{enrollment}", [StudentController::class, 'show'])->name("student.show");
        Route::post("ratingCourse/{course}",[CourseReviewController::class,"store"])->name('rating.course');
    // Route::put("ratingCourse/{enrollment}", [CourseReviewController::class, "store"])->name('rating.course');
});
