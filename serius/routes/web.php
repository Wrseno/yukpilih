<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ChangeController;
use App\Http\Controllers\Admin\AdmPollController;
use App\Http\Controllers\Admin\AdmDivisionController;
use App\Http\Controllers\Admin\AdmChoiceController;
use App\Http\Controllers\Admin\AdmUserController;
use App\Http\Controllers\Admin\AdmVoteController;
use App\Http\Controllers\Admin\PollResultController;
use App\Http\Controllers\User\UserPollController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});


//AUTH
Route::get('register',[RegisterController::class, 'register'])->name('register');
Route::post('post.register',[RegisterController::class, 'postregister'])->name('post.register');
Route::get('login',[LoginController::class, 'login'])->name('login');
Route::post('post.login',[LoginController::class, 'postlogin'])->name('post.login');
Route::get('logout',[LoginController::class, 'logout'])->name('logout');
Route::get('changepw',[ChangeController::class, 'changepw'])->name('changepw');
Route::post('post.changepw',[ChangeController::class, 'postchangepw'])->name('post.changepw');
Route::get('dashboard',[LoginController::class, 'dashboard'])->name('dashboard')->middleware('auth');
Route::resource('result', PollResultController::class);
//Route::resource('userpoll', UsrPollController::class);

Route::middleware(['checklevel:user'])->group(function(){
    Route::resource('userpoll', UserPollController::class);
    Route::get('userpilih.poll/{id}', [UserPollController::class, 'userpilihpoll']);
    // Route::get('pilihuser.poll/{id}', [UserPollController::class, 'pilihuserpoll']);
});

    Route::middleware(['checklevel:admin'])->group(function(){
        Route::resource('poll', AdmPollController::class);
        Route::get('deletepoll/{id}', [AdmPollController::class, 'deletepoll'])->name('deletepoll');
        Route::resource('division', AdmDivisionController::class);
        Route::get('deletedivision/{id}', [AdmDivisionController::class, 'deletedivision'])->name('deletedivision');
        Route::resource('choice', AdmChoiceController::class);
        Route::get('deletechoice/{id}', [AdmChoiceController::class, 'deletechoice'])->name('deletechoice');
        Route::resource('manageuser', AdmUserController::class);
        Route::get('deleteuser/{id}', [AdmUserController::class, 'deleteuser'])->name('deleteuser');
        Route::resource('vote', AdmVoteController::class);
        Route::get('pilih.poll/{id}', [AdmChoiceController::class, 'pilihpoll']);
    });

    

;

