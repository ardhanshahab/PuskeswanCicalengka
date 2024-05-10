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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/cashier',[App\Http\Controllers\orderController::class,'cashier']);
Route::get('/getDokter',[App\Http\Controllers\dokterController::class,'getDokter'])->name('getDokter');
Route::put('masters/dokter/{dokter}', [App\Http\Controllers\dokterController::class,'update'])->name('dokters.update');
Route::get('/getPasien',[App\Http\Controllers\pasienController::class,'getPasien'])->name('getPasien');
Route::put('masters/pasien/{pasien}', [App\Http\Controllers\pasienController::class,'update'])->name('pasiens.update');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/master/dokter', \App\Http\Controllers\dokterController::class);
Route::resource('/master/pasien', \App\Http\Controllers\pasienController::class);
