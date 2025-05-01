<?php



use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PricingPlanController;


Route::get('/pricing', [PricingPlanController::class, 'index'])->name('pricing');
Route::post("/pricing/{pricingPlan}", [PricingPlanController::class, 'bayCredit'])->name("bayCreated");