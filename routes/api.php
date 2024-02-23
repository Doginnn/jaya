<?php

use App\Http\Controllers\Api\PaymentController;
use Illuminate\Support\Facades\Route;

# Routes to Payments
//Route::get('/rest/payments', [PaymentController::class, 'index']);
Route::post('/rest/payments', [PaymentController::class, 'store']);
//Route::get('/rest/payments', [PaymentController::class, 'index']);
//Route::get('/rest/payments/{id}', [PaymentController::class, 'show']);
//Route::put('/rest/payments/{id}', [PaymentController::class, 'update']);
//Route::delete('/rest/payments/{id}', [PaymentController::class, 'destroy']);
