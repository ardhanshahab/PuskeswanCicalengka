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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/cashier',[App\Http\Controllers\orderController::class,'cashier']);
Route::get('/getDokter',[App\Http\Controllers\dokterController::class,'getDokter'])->name('getDokter');
Route::put('masters/dokter/{dokter}', [App\Http\Controllers\dokterController::class,'update'])->name('dokters.update');
Route::get('/getPasien',[App\Http\Controllers\hewanController::class,'getPasien'])->name('getPasien');
Route::put('masters/pasien/{pasien}', [App\Http\Controllers\pasienController::class,'update'])->name('pasiens.update');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\landingpageController::class, 'welcome'])->name('welcome');

Route::resource('/master/dokter', \App\Http\Controllers\dokterController::class);
Route::resource('/master/hewan', \App\Http\Controllers\hewanController::class);

Route::resource('antrian', \App\Http\Controllers\AntrianController::class);
Route::post('antrian/{id}/start-examination', [\App\Http\Controllers\AntrianController::class, 'startExamination'])->name('antrian.startExamination');
Route::post('antrian/{id}/finish-examination', [\App\Http\Controllers\AntrianController::class, 'finishExamination'])->name('antrian.finishExamination');

Route::get('/schedules', [\App\Http\Controllers\ScheduleController::class, 'index'])->name('schedules.index');
Route::get('/schedules/{schedule}/edit', [\App\Http\Controllers\ScheduleController::class, 'edit'])->name('schedules.edit');
Route::put('/schedules/{schedule}', [\App\Http\Controllers\ScheduleController::class, 'update'])->name('schedules.update');
Route::get('/historipasien', [\App\Http\Controllers\pendaftaranController::class, 'index'])->name('pendaftaran.index');
Route::get('/getPendaftaran',[App\Http\Controllers\pendaftaranController::class,'getPendaftaran'])->name('getPendaftaran');
Route::get('/pembayaran', [\App\Http\Controllers\landingpageController::class, 'pembayaran'])->name('pembayaran');
