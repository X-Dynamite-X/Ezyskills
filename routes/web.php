<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');


require __DIR__ . '/auth.php';
require __DIR__ . '/student.php';
require __DIR__ . '/courses.php';
require __DIR__ . '/trainer.php';
require __DIR__ . '/pricing.php';
require __DIR__ . '/admin.php';
