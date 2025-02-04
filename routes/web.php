<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RetoController;
use App\Http\Controllers\MultimediaController; 


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

Route::resource('retos', RetoController::class)->except(['show']);
Route::get('web_solidaria/retos/indexsololectura', [RetoController::class, 'indexsololectura'])->name('retos.indexsololectura');
Route::get('admin/retos/index', [RetoController::class, 'index'])->name('retos.index');
Route::get('admin/retos/create', [RetoController::class, 'create'])->name('retos.create');
Route::get('/multimedia/create', [MultimediaController::class, 'create'])->name('multimedia.create');
Route::post('/multimedia', [MultimediaController::class, 'store'])->name('multimedia.store');