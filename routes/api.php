<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login')->name('login');
    Route::post('register', 'register')->name('register');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');
});

Route::controller(TodoController::class)->prefix('todos')->group(function () {
    Route::get('/', 'index');
    Route::post('/', 'create');
});
