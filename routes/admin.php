<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\PricingPlanController;
use Illuminate\Support\Facades\Route;



Route::middleware(['auth', "role:admin"])->name("admin.")->group(function () {
    Route::get("admin/users", [UsersController::class, 'index'])->name("users");
    Route::get('/admin/users/search', [UsersController::class, 'search'])->name('users.search');
    Route::put("admin/users/{user}", [UsersController::class, 'update'])->name("users.update");
    Route::delete("admin/users/{user}", [UsersController::class, 'destroy'])->name("users.destroy");
    Route::resource('admin/pricingPlan', PricingPlanController::class)->names("pricingPlan");

});
