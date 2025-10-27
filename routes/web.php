<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::resource('user', UserController::class);
Route::middleware(['auth'])->group(function() {
    Route::resource('tasks', TaskController::class);
    Route::post('tasks/{task}/reopen', [TaskController::class, 'reopen'])
    ->name('tasks.reopen');
});