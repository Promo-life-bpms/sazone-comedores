<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AdvertisementController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\DiningRoomController;
use App\Http\Controllers\HealthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MAntiEstresController;
use App\Http\Controllers\MenuBannerController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\NutriCapsController;
use App\Http\Controllers\NutritionController;
use App\Http\Controllers\TagsNameController;
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
Auth::routes();
Route::get('/loginEmail', [LoginController::class, 'loginWithLink'])->name('loginWithLink');
Route::get('/logoutUser', [LoginController::class, 'logoutUser'])->name('logoutUser');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/mi-comedor', [App\Http\Controllers\HomeController::class, 'comedor'])->name('dining.showUser');
Route::get('/cupones', [App\Http\Controllers\HomeController::class, 'cupones'])->name('cupones');
Route::get('/menu', [App\Http\Controllers\HomeController::class, 'menu'])->name('menu');
Route::get('/acerca-de', [App\Http\Controllers\HomeController::class, 'acerca'])->name('acerca');
Route::get('/mi-cuenta', [App\Http\Controllers\HomeController::class, 'cuenta'])->name('mi-cuenta');
Route::get('/nutricion-vida', [App\Http\Controllers\HomeController::class, 'nutricionVida'])->name('nutricion-vida');

Route::post('/store/commentary', [App\Http\Controllers\CommentaryController::class, 'storeCommentary'])->name('storeCommentary');

Route::post('/store/commentary', [App\Http\Controllers\MenuBannerController::class, 'store'])->name('storeMenuBanner');
Route::post('/delete/commentary', [App\Http\Controllers\MenuBannerController::class, 'delete'])->name('deleteMenuBanner');
Route::post('/reset/menu', [App\Http\Controllers\MenuController::class, 'resetMenu'])->name('resetMenu');

Route::post('/menu/visble', [App\Http\Controllers\MenuController::class, 'setMenuVisible'])->name('setMenuVisible');



Route::post('/coupon-store', [CouponController::class, 'store'])->name('coupon.store');

Route::prefix('admin')->group(function () {
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::put('/users/update', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/delete', [UserController::class, 'destroy'])->name('users.deleteUser');
    Route::put('/users/updateUserStatusAndEmail', [UserController::class, 'updateUserStatusAndEmail'])->name('users.updateUserStatusAndEmail');
    Route::post('/users/send-access', [UserController::class, 'sendAccess'])->name('users.sendAccess');
    // Route::post('/users/send-accessAll', [UserController::class, 'sendAccessAll'])->name('users.sendAccessAll');
    Route::post('/users/send-accessAll', [UserController::class, 'sendAccessAll'])->name('users.sendAccessAll');
    Route::post('/users/import', [UserController::class, 'import'])->name('users.import');
    Route::get('/', [AdminController::class, 'index'])->name('admin');
    Route::post('/anuncios', [AdvertisementController::class, 'store'])->name('anuncios.store');
    Route::post('/anuncios/editAdvertisement', [AdvertisementController::class, 'editAdvertisement'])->name('anuncios.editAdvertisement');
    Route::delete('/anuncios/delete', [AdvertisementController::class, 'deleteAdvertisement'])->name('anuncios.deleteAdvertisement');
    Route::post('/tags', [TagsNameController::class, 'store'])->name('tags.store');
    Route::post('/tags/editTag', [TagsNameController::class, 'editTag'])->name('tags.editTag');
    Route::delete('/tags/delete', [TagsNameController::class, 'deleteTag'])->name('tags.deleteTag');
    Route::post('/health', [HealthController::class, 'store'])->name('saludable.store');
    Route::post('/health/editHealth', [HealthController::class, 'editHealth'])->name('saludable.editHealth');
    Route::delete('/health/delete', [HealthController::class, 'deleteHealth'])->name('saludable.deleteHealth');
    Route::post('/nutricion', [NutritionController::class, 'store'])->name('nutricion.store');
    Route::post('/nutricion/editNutrition', [NutritionController::class, 'editNutrition'])->name('nutricion.editNutrition');
    Route::delete('/nutricion/delete', [NutritionController::class, 'deleteNutrition'])->name('nutricion.deleteNutrition');
    Route::post('/menuEstres', [MAntiEstresController::class, 'store'])->name('menuEstres.store');
    Route::post('/menuEstres/editMenuEstres', [MAntiEstresController::class, 'editMenuEstres'])->name('menuEstres.editMenuEstres');
    Route::delete('/menuEstres/delete', [MAntiEstresController::class, 'deleteMenuEstres'])->name('menuEstres.deleteMenuEstres');
    Route::post('/nutriCapsulas', [NutriCapsController::class, 'store'])->name('nutriCapsulas.store');
    Route::post('/nutriCapsulas/editMenuEstres', [NutriCapsController::class, 'editNutriCaps'])->name('nutriCapsulas.editNutriCaps');
    Route::delete('/nutriCapsulas/delete', [NutriCapsController::class, 'deleteNutriCaps'])->name('nutriCapsulas.deleteNutriCaps');
});

Route::prefix('super')->group(function () {
    Route::get('/', [DiningRoomController::class, 'index'])->name('dining.index');
    Route::get('/admins', [DiningRoomController::class, 'admins'])->name('dining.admins');
    Route::put('/updateDiningStatus', [DiningRoomController::class, 'updateDiningStatus'])->name('dining.updateDiningStatus');
    Route::post('/admins/create', [DiningRoomController::class, 'storeUserAdmin'])->name('admin.store.admin');
    Route::put('/admins/update', [DiningRoomController::class, 'updateUserAdmin'])->name('admin.update.admin');

    Route::get('/dining/{diningRoom}/preview', [HomeController::class, 'preview'])->name('dining.preview');


    Route::get('/dinings/{diningRoom}', [DiningRoomController::class, 'show'])->name('dining.show');
    Route::post('/dinings', [DiningRoomController::class, 'store'])->name('dining.store');
    Route::put('/dinings/{dining}/update-details-general', [DiningRoomController::class, 'updateGeneralDetails'])->name('dining.updateDetailsGeneral');
    Route::post('/dining/editDiningRoom', [DiningRoomController::class, 'editDiningRoom'])->name('dining.editDiningRoom');

    Route::post('/menus', [MenuController::class, 'store'])->name('menu.store');
    Route::put('/menus/update', [MenuController::class, 'update'])->name('menu.update');
    Route::post('/menus/import', [MenuController::class, 'import'])->name('menu.import');
    Route::delete('/menus/delete', [MenuController::class, 'destroy'])->name('menu.destroy');
});
