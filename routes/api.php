<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('/students', [Students::class, 'index']);
Route::post('/student', [Students::class, 'store']);
Route::put('/student/{id}', [Students::class, 'update']);
Route::delete('/student/{id}', [Students::class, 'destroy']);

//Protected Routes
//Get Students by name
Route::get('/students/{name}', [Students::class, 'search']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/students/{name}', [Students::class, 'search']);
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout']);