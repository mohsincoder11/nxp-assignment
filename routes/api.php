<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Provider\OrderController;


Route::middleware(['auth:sanctum'])
->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware(['auth:sanctum'])
->post('/orders', [OrderController::class, 'store']);

Route::post('/login', [LoginController::class, 'login']);




