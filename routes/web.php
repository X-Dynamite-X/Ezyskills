<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Events\EnrollUserInCourseNotificationEvent;

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

Route::get("/test" ,function(){

    broadcast(new EnrollUserInCourseNotificationEvent("test"));

});


$files = [
    'auth.php',
    'student.php',
    'courses.php',
    'trainer.php',
    'pricing.php',
    'admin.php',
];

foreach ($files as $file) {
    require __DIR__ . '/' . $file;
}