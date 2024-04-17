<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::redirect('/', '/login');

Route::resource('/masterdata/dokter', \App\Http\Controllers\dokterController::class);

Route::get('/getdokter', [App\Http\Controllers\dokterController::class, 'getdokter'])->name('getdokter');


Route::resource('/masterdata/hewan', \App\Http\Controllers\hewanController::class);
Route::resource('/pendaftaran', \App\Http\Controllers\pendaftaranController::class);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
