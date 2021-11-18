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
   Route::get('/cart', [MainController::class, "cart"])->name("cart");
   Route::get('/cart/payment', [MainController::class, "payment"])->name("payment");
   Route::get('/payment/validated', [MainController::class, "validation"])->name("validation");

   Route::get('/storage/{filename}', [ImageAssetController::class, "displayImage"])->name('displayImage');

});

Route::name('api_')->prefix("/api")->group(function () {
   Route::patch('/cart/{itemId}', [ApiController::class, "updateCart"]);
   Route::get('/cart/quantity', [ApiController::class, "getCartQuantity"]);
   Route::get('/cart/destroy', [ApiController::class, "destroyCart"]);
   Route::post('/cart/validate', [ApiController::class, "validateCart"]);
   Route::delete('/cart/empty', [ApiController::class, "emptyCart"]);
});

require __DIR__ . '/auth.php';
