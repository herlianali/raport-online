<?php

use App\Http\Controllers\EkstraController;
use App\Http\Controllers\EkstrakulikulerController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\KdController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\SiswaController;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('kelas', KelasController::class)->middleware('auth');
Route::resource('mapel', MapelController::class)->middleware('auth');
Route::resource('eks', EkstraController::class)->middleware('auth');
Route::resource('ekstrakulikuler', EkstrakulikulerController::class)->middleware('auth');
Route::resource('kd', KdController::class)->middleware('auth');
Route::resource('guru', GuruController::class)->middleware('auth');
Route::resource('siswa', SiswaController::class)->middleware('auth');

