<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Employee\EmployeeController;
use App\Http\Controllers\Exam\ExamController;
use App\Http\Controllers\User\StatusUserController;
use App\Http\Controllers\User\UserController;

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth'])->group(function () {
    //toast('Bem vindo ao sistema', 'success');
    Route::get('/dashboard', function () {
        return view('admintemplate');
    });


    Route::resource('employees', EmployeeController::class)->except('destroy', 'show');
    Route::resource('employees.exams', ExamController::class);



    Route::resource('users', UserController::class)->except('destroy');
    Route::resource('users.status', StatusUserController::class)->only(['edit', 'show']);
});

//Route::get('/dashboard', function () {
//    return view('admintemplate');
//})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
