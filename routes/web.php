<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\DinningRoomController;
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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/cupones', [App\Http\Controllers\HomeController::class, 'cupones'])->name('cupones');
Route::get('/menu', [App\Http\Controllers\HomeController::class, 'menu'])->name('menu');
Route::get('/acerca-de', [App\Http\Controllers\HomeController::class, 'acerca'])->name('acerca');
Route::get('/mi-cuenta', [App\Http\Controllers\HomeController::class, 'cuenta'])->name('mi-cuenta');

Route::prefix('admin')->group(function () {
    Route::resource('users', UserController::class);
    Route::get('/', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('admin');
});

Route::prefix('super')->group(function () {
    Route::get('/', [DinningRoomController::class, 'index'])->name('dinning.index');
    Route::get('/dinnings/{dinning}', [DinningRoomController::class, 'show'])->name('dinning.show');
    Route::post('/dinnings', [DinningRoomController::class, 'store'])->name('dinning.store');
    Route::put('/dinnings/{dinning}/update-details-general', [DinningRoomController::class, 'updateGeneralDetails'])->name('dinning.updateDetailsGeneral');
});
