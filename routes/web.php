<?php

use App\Http\Controllers\DatatableController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StudentController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::group(['prefix' => 'admin', 'middleware' => ['auth'], 'as' => 'admin.'], function(){
    Route::get('/dashboard',[HomeController::class, 'dashboard']) -> name('dashboard');

    Route::get('/guest',[HomeController::class, 'index']) -> name('index');
    //untuk membuat data
    Route::get('/create',[HomeController::class, 'create']) -> name('user.name');
    //untuk membuat data
    Route::post('/store',[HomeController::class, 'store']) -> name('user.store');
    //untuk menampilkan view edit
    Route::get('/edit/{id}',[HomeController::class, 'edit']) -> name('user.edit');
    //untuk update data
    Route::put('/update/{id}',[HomeController::class, 'update']) -> name('user.update');
    //untuk delete data
    Route::delete('/delete/{id}',[HomeController::class, 'delete']) -> name('user.delete');

    Route::get('/clientside',[DatatableController::class, 'clientside']) -> name('clientside');
    Route::get('/serverside',[DatatableController::class, 'serverside']) -> name('serverside');
});
Route::get('/login', [LoginController::class, 'index']) -> name('login');
Route::post('/login-proses', [LoginController::class, 'login_proses']) -> name('login-proses');
Route::get('/logout', [LoginController::class, 'logout']) -> name('logout');

Route::get('/register',[LoginController::class, 'register']) -> name('register');
Route::post('/register-proses', [LoginController::class, 'register_proses']) -> name('register-proses');



