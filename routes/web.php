<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Users\UserController;
use App\Http\Controllers\Users\CategoryController;
use App\Http\Controllers\Users\ProductController;


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
    return view('login');
});




Route::get('/partner/login', [LoginController::class, 'showLoginForm'])->name('partner.login');
Route::post('/partner/checklogin',[LoginController::class,'checklogin'])->name('partner.checklogin');

Route::group(['middleware' => 'partner'], function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    });

    Route::get('/logout',[LoginController::class,'logout']);


    Route::get('user_list', [UserController::class, 'user_list']);
    Route::get('view_user', [UserController::class, 'view_user']);
    Route::get('display_user/{id}', [UserController::class, 'display_user']);
    Route::post('add_user', [UserController::class, 'add_user'])->name('add_user');
    Route::post('update_user', [UserController::class, 'update_user'])->name('update_user');
    Route::get('deleteUser', [UserController::class, 'deleteUser'])->name('deleteUser');

    Route::get('category_list', [CategoryController::class, 'category_list']);
    Route::get('display_category', [CategoryController::class, 'display_category']);
    Route::post('add_category', [CategoryController::class, 'add_category']);
    Route::get('view_category/{id}', [CategoryController::class, 'view_category']);
    Route::post('update_category', [CategoryController::class, 'update_category'])->name('update_category');
    Route::get('deleteCategory', [CategoryController::class, 'deleteCategory'])->name('deleteCategory');

    Route::get('product_list', [ProductController::class, 'product_list']);
    Route::get('display_product', [ProductController::class, 'display_product']);
    Route::post('add_product', [ProductController::class, 'add_product']);
    Route::get('view_product/{id}', [ProductController::class, 'view_product']);
    Route::post('update_product', [ProductController::class, 'update_product'])->name('update_product');
    Route::get('deleteProduct', [ProductController::class, 'deleteProduct'])->name('deleteProduct');
    
    
});
