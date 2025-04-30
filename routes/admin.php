<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\Admin\UsersController;
use Illuminate\Support\Facades\Route;



Route::middleware(['auth', "role:admin"])->group(function () {
    Route::get("admin/users", [UsersController::class, 'index'])->name("admin.users");
    Route::get('/admin/users/search', [UsersController::class, 'search'])->name('admin.users.search');
    Route::put("admin/users/{user}", [UsersController::class, 'update'])->name("admin.users.update");
    Route::delete("admin/users/{user}", [UsersController::class, 'destroy'])->name("admin.users.destroy");
});
