<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PolicemanController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\EmployeeController;


Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth'])->group(function (){
    //toast('Bem vindo ao sistema', 'success');
    Route::get('/dashboard', function () { return view('admintemplate'); });


    Route::prefix('employee')->group(function (){
        Route::get('/', [EmployeeController::class, 'show']);
        Route::post('/', [EmployeeController::class, 'create']);
    });


    Route::prefix('user')->group(function () {
        Route::get('/', [UserController::class, 'index']);
        Route::post('/', [UserController::class, 'create']);
        Route::get('/edit-yourself', [UserController::class, 'showYourselfData']);
        Route::post('/edit-yourself', [UserController::class, 'editYourselfData']);
        Route::get('/first', [UserController::class, 'callFirstAccessUser']);
        Route::get('/list', [UserController::class, 'callPageListUser']);
        Route::get('/change-status', [UserController::class, 'changeStatus'])->name('change-status');
        Route::get('/change-status-admin', [UserController::class, 'changeSituationUser'])->name('change-status-admin');
        Route::post('/update-first-access', [UserController::class, 'updatePassword']);
    });
});

//Route::get('/dashboard', function () {
//    return view('admintemplate');
//})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
