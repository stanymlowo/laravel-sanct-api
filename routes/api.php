<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use PHPUnit\TextUI\XmlConfiguration\Group;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();

// });

Route::controller(AuthController::class)->prefix('v1')->group(function () {
    Route::post('/register', 'register');
    Route::post('/login', 'login');

    Route::get('/users','getUser');
});

Route::middleware(['auth:sanctum'])->group(function () {

    Route::controller(ProductController::class)->prefix('v1')->group(function () {

        Route::get('/products/search/{name}', 'search');

        Route::get('/products', 'index');

        Route::post('/products', 'store');

        Route::get('products/{product}', 'show');

        Route::put('/productUpdate/{product}', 'update');

        Route::delete('/product/{product}', 'destroy');
    });

    Route::post('/logout', [AuthController::class, 'logout']);
});
