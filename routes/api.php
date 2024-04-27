<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/




Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout')->middleware('auth:api');
});

// Route::apiResource('department',Department::class)->middleware('checkUser');

Route::apiResource('department',DepartmentController::class)->middleware('checkUser');
Route::apiResource('employee',EmployeeController::class)->middleware('checkUser');
Route::apiResource('project',ProjectController::class)->middleware('checkUser');
Route::apiResource('note',NoteController::class)->middleware('checkUser');
