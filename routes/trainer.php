<?php


use App\Http\Controllers\Trainer\TrainerController;
use Illuminate\Support\Facades\Route;



Route::middleware(['auth', "role:trainer"])->group(function () {
    Route::get("trainer", [TrainerController::class, 'index'])->name("trainer.index");
    Route::get("trainer/create", [TrainerController::class, 'create'])->name("trainer.create");
    Route::post("trainer/store", [TrainerController::class, 'store'])->name("trainer.store");
    Route::get('/trainer/search', [TrainerController::class, 'search'])->name('trainer.search');
    Route::put("trainer/{course}", [TrainerController::class, 'update'])->name("trainer.update");
    Route::delete("trainer/{course}", [TrainerController::class, 'destroy'])->name("trainer.destroy");
});