<?php

use App\Http\Controllers\DeviceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BreakdownController;
use App\Http\Controllers\DepartamentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\QuestionController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/graph1', [BreakdownController::class, 'graph1']);

Route::get('/graph2', [UserController::class, 'graph2']);

Route::get('/graph3', [DepartamentController::class, 'graph3']);

Route::get('/graph4', [DeviceController::class, 'graph4']);

Route::get('/graph7', [QuestionController::class, 'graph7']);
