<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/active-users', [UserController::class, 'getActiveUsers']);

// Api task resources
Route::group(['prefix' => 'tasks'], function () {
    Route::get('/', [TaskController::class, 'index']);
    Route::put('/{id}/complete', [TaskController::class, 'complete']);
});
