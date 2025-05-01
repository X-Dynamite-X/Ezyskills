<?php


use App\Http\Controllers\Trainer\TrainerController;
use Illuminate\Support\Facades\Route;



Route::middleware(['auth', "role:trainer"])->group(function () {
    Route::get("trainer", [TrainerController::class, 'index'])->name("trainer.index");
    Route::get('/trainer/search', [TrainerController::class, 'search'])->name('trainer.search');
    Route::put("trainer/{course}", [TrainerController::class, 'update'])->name("trainer.update");
    Route::delete("trainer/{course}", [TrainerController::class, 'destroy'])->name("trainer.destroy");
});