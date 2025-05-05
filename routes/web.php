<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{HomeController,NotificationController};
use Illuminate\Support\Facades\Auth;


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
Route::get('/notifications', [NotificationController::class, 'getUserNotifications'])
    ->middleware('auth');
Route::post('/notifications/markAsRead',[NotificationController::class , 'markAllAsRead' ] )->middleware('auth')->name('notifications.markAsRead');


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