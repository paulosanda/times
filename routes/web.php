<?php

use App\Http\Controllers\PlayerController;
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

/*Route::get('/', function () {
    return view('index');
}); */
Route::get('/', [PlayerController::class, 'index'])->name('index');
Route::get('/cadastrar',[PlayerController::class,'formPlayer'])->name('cadastrar');
Route::post('/cadastrar',[PlayerController::class,'store'])->name('cad.player');
Route::get('/confirm/{id}',[PlayerController::class, 'confirm'])->name('confirm/{id}');
Route::get('/sorteio',[PlayerController::class, 'sorteio'])->name('sorteio');
Route::post('/sorteio',[PlayerController::class, 'dosorteio'])->name('dosorteio');
