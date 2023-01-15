<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;


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

// Route::middleware('auth:api')->get('/users', function (Request $request) {
//     return $request->users();
// });

Route::group(['prefix' => 'v1'], function () {
            
        Route::group(['prefix' => 'user'], function () { //customer
            Route::post('/register', [AuthController::class, 'register']);
            Route::post('/login', [AuthController::class, 'login']);
          
            Route::group(['middleware' => ['assign.guard:app_api', 'jwt.verify']], function () {
            
            Route::get('/category/list', [CategoryController::class, 'categoryList']);
            Route::get('/product/list', [ProductController::class, 'productList']);
            Route::get('/get_product_details', [ProductController::class, 'get_product_details']);
           
           
            Route::get('/profile', [AuthController::class, 'userProfile']);
            Route::post('/logout', [AuthController::class, 'logout']);
            Route::post('/refresh', [AuthController::class, 'refresh']);

            });
        });
});