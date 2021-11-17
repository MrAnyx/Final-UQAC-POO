<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\ImageAssetController;
use App\Http\Controllers\MainController;
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

Route::name('app_')->group(function () {
   Route::get('/', [MainController::class, "home"])->name("home");
   Route::get('/department/{id}', [MainController::class, "department"])->name("department");

   Route::get('/storage/{filename}', [ImageAssetController::class, "displayImage"])->name('displayImage');

});

Route::name('api_')->prefix("/api")->group(function () {
   Route::patch('/cart/{itemId}', [ApiController::class, "updateCart"])->name("api_UpdateCart");
   Route::get('/cart/quantity', [ApiController::class, "getCartQuantity"])->name("api_CartQuantity");
   Route::get('/cart/destroy', [ApiController::class, "destroyCart"])->name("api_DestroyCart");
});

require __DIR__ . '/auth.php';
