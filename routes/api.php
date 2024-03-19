<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/employees', [\App\Http\Controllers\EmployeeController::class, 'getAll']);
Route::post('/employees', [\App\Http\Controllers\EmployeeController::class, 'create']);
Route::get('/employees/{id}', [\App\Http\Controllers\EmployeeController::class, 'find']);
Route::put('/employees/{id}', [\App\Http\Controllers\EmployeeController::class, 'update']);
Route::delete('/employees/{id}', [\App\Http\Controllers\EmployeeController::class, 'delete']);

Route::get('/contracts', [\App\Http\Controllers\ContractController::class, 'getAll']);
Route::post('/contracts', [\App\Http\Controllers\ContractController::class, 'create']);
Route::get('/contracts/{id}', [\App\Http\Controllers\ContractController::class, 'find']);
Route::put('/contracts/{id}', [\App\Http\Controllers\ContractController::class, 'update']);
Route::delete('/contracts/{id}', [\App\Http\Controllers\ContractController::class, 'delete']);
