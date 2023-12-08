<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AdvertisementController;
use App\Http\Controllers\DiningRoomController;
use App\Http\Controllers\MenuController;
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
    Route::post('/anuncios', [AdvertisementController::class, 'store'])->name('anuncios.store');
});

Route::prefix('super')->group(function () {
    Route::get('/', [DiningRoomController::class, 'index'])->name('dining.index');
    Route::get('/dinings/{diningRoom}', [DiningRoomController::class, 'show'])->name('dining.show');
    Route::post('/dinings', [DiningRoomController::class, 'store'])->name('dining.store');
    Route::put('/dinings/{dining}/update-details-general', [DiningRoomController::class, 'updateGeneralDetails'])->name('dining.updateDetailsGeneral');
    Route::post('/menus', [MenuController::class, 'store'])->name('menu.store');
    Route::post('/menus/import', [MenuController::class, 'import'])->name('menu.import');
});
