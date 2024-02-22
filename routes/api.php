<?php

use App\Http\Controllers\Api\PaymentController;
use Illuminate\Support\Facades\Route;

# Routes to Payments
Route::post('/payments', [PaymentController::class, 'store']);
