<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EmployeeController;
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


    Route::prefix('employee')->group(function () {
        Route::get('/', [EmployeeController::class, 'show'])->name('employee.index');
        Route::post('/', [EmployeeController::class, 'create']);
        Route::get('/list/{id}', [EmployeeController::class, 'listDataEmployee'])->name('employee.show');
        Route::get('/list', [EmployeeController::class, 'listEmployee'])->name('employee.list');
        Route::post('/update/{employee}', [EmployeeController::class, 'updateEmployee'])->name('employee.edit');
        Route::get('/exam/{employee}', [EmployeeController::class, 'showExamEmployee'])->name('employee.exam.show');
        Route::get('/exam/list/{employee}', [EmployeeController::class, 'listExamEmployee'])->name('employee.exam.list');
        Route::post('/exam', [EmployeeController::class, 'createExamEmployee'])->name('employee.exam.create');
    });

    // Route::prefix('user')->group(function () {
    //     Route::get('/', [UserController::class, 'index']);
    //     Route::post('/', [UserController::class, 'create']);
    //     Route::get('/edit-yourself', [UserController::class, 'showYourselfData']);
    //     Route::post('/edit-yourself', [UserController::class, 'editYourselfData']);
    //     Route::get('/first', [UserController::class, 'callFirstAccessUser']);
    //     Route::get('/list', [UserController::class, 'callPageListUser']);
    //     Route::get('/change-status', [UserController::class, 'changeStatus'])->name('change-status');
    //     Route::get('/change-status-admin', [UserController::class, 'changeSituationUser'])->name('change-status-admin');
    //     Route::post('/update-first-access', [UserController::class, 'updatePassword']);
    // });

    Route::prefix('user')->group(function () {
        Route::resource('users', UserController::class)->except('destroy');
        Route::resource('users.status', StatusUserController::class)->only(['edit', 'update']);
    });
});

//Route::get('/dashboard', function () {
//    return view('admintemplate');
//})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
