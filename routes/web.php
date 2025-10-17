<?php

use Illuminate\Support\Facades\Route;

Route::post('/orders', [OrderController::class, 'store']);

