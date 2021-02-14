<?php

use App\Http\Controllers\TodoController;
use App\Http\Controllers\UserController;


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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['auth:sanctum'])->get('/todos', [TodoController::class, 'Index']);

Route::middleware(['auth:sanctum'])->prefix('/todo')->group(function () {
    Route::post('/store', [TodoController::class, 'store']);
    Route::put('/{id}', [TodoController::class, 'update']);
    Route::delete('/{id}', [TodoController::class, 'destroy']);
});


Route::middleware(['auth:sanctum'])->prefix('/user')->group(function () {
    Route::post('/todos', [UserController::class, 'userTodos']);
});
