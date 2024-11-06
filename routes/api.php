<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MealCategoryController;
use App\Http\Controllers\MealController;
use App\Http\Controllers\UnitMeasureController;
use App\Http\Controllers\MealAvailabilityController;
use App\Http\Controllers\MealOrderController;
use App\Http\Controllers\PaymentModeController;
use App\Http\Controllers\OrderItemController;
use App\Http\Controllers\DurationCategoryController;





Route::apiResource('order-items', OrderItemController::class);
Route::apiResource('meal-orders', MealOrderController::class);
Route::apiResource('meal-availabilities', MealAvailabilityController::class);
Route::apiResource('unit-measures', UnitMeasureController::class);
Route::apiResource('meals', MealController::class);
Route::apiResource('meal-categories', MealCategoryController::class);
Route::apiResource('payment-modes', PaymentModeController::class);
Route::apiResource('duration-categories', DurationCategoryController::class);


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
