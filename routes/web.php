<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PolicemanController;
use App\Http\Controllers\RegisterController;


Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth'])->group(function (){
    //toast('Bem vindo ao sistema', 'success');
    Route::get('/dashboard', function () { return view('admintemplate'); });


    Route::prefix('register-occurrences')->group(function (){
        Route::get('/search', [RegisterController::class, 'show'])->name('register-occurrences.show');
        Route::get('/', [RegisterController::class, 'index'])->name('register-occurrences.index');
        Route::get('/{id}', [RegisterController::class, 'edit'])->name('register-occurrences.edit');
    });
    Route::resource('policeman', PolicemanController::class);

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
