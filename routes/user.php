<?php

use Illuminate\Support\Facades\Route;

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contactUs', function () {
    return view('contactUs');
})->name('contactUs');
Route::get('/faq', function () {
    return view('faq');
})->name('faq');
Route::get('/pricing', function () {
    return view('pricing');
})->name('pricing');




 