<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contactUs', function () {
    return view('contactUs');
})->name('contactUs');
Route::get('/faq', function () {
    return view('faq');
})->name('faq');


require __DIR__ . '/auth.php';
require __DIR__ . '/student.php';
require __DIR__ . '/courses.php';
require __DIR__ . '/trainer.php';
require __DIR__ . '/pricing.php';
require __DIR__ . '/admin.php';
