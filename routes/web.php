<?php

use App\Http\Controllers\CutiController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KaryawanController;
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

Route::get('/', [HomeController::class, 'index']);

route::resource('index', HomeController::class);
route::resource('karyawan', KaryawanController::class);
route::resource('cuti', CutiController::class);
Route::get('/sisaCuti', [CutiController::class, 'sisaCuti'])->name('cuti.sisaCuti');