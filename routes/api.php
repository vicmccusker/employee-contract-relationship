<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/employees', [\App\Http\Controllers\EmployeeController::class, 'getAll']);
Route::get('/contracts', [\App\Http\Controllers\ContractController::class, 'getAll']);
