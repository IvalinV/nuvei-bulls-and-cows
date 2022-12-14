<?php

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
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function(){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/score', [\App\Http\Controllers\ScoreController::class, 'index'])->name('score.index');
    Route::post('/score', [\App\Http\Controllers\ScoreController::class, 'store'])->name('score.store');
});

Route::post('/restrictions/swap',[\App\Http\Controllers\RestrictionController::class, 'swap'])->name('restriction.swap');
Route::post('/restrictions/move',[\App\Http\Controllers\RestrictionController::class, 'changePosition'])->name('restriction.move');
Route::post('/restrictions/validate',[\App\Http\Controllers\RestrictionController::class, 'validateInput'])->name('restriction.validate');

Route::post('/digits/found', [\App\Http\Controllers\GameController::class, 'checkForFoundNumbers'])->name('game.check.digits');
