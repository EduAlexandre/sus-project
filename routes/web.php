<?php

use App\Http\Controllers\Dashboard\DashBoardController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Employee\EmployeeController;
use App\Http\Controllers\Exam\ExamController;
use App\Http\Controllers\User\StatusUserController;
use App\Http\Controllers\User\UserController;

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth'])->group(function () {
    Route::resource('dashboard', DashBoardController::class)->only(['index', 'show']);

    Route::resource('employees', EmployeeController::class)->except(['destroy', 'show']);
    Route::resource('employees.exams', ExamController::class);

    Route::resource('users', UserController::class)->except('destroy');
    Route::resource('users.status', StatusUserController::class)->only(['edit', 'show']);
});

require __DIR__ . '/auth.php';
