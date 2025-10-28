<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'showLoginForm'])->name('loginForm.get');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/', [AuthController::class, 'showLoginForm'])->name('loginForm.post');
Route::post('/register', [AuthController::class, 'register'])->name('register');


Route::middleware(['auth'])->group(function() {
    Route::resource('user', UserController::class);
    Route::resource('tasks', TaskController::class);
    Route::post('/tasks/{task}/reopen', [TaskController::class, 'reopen'])
    ->name('tasks.reopen');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});