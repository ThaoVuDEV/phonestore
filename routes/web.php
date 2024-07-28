<?php

use App\Http\Controllers\AttributeController;
use App\Http\Controllers\AttributeDetailController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Middleware\LoginMiddleware;
use Illuminate\Support\Facades\Route;



Route::get('/', [HomeController::class, 'index']);

Route::group(['prefix' => 'admin/products', 'middleware' => 'admin'], function () {
    Route::get('index',                               [ProductController::class, 'index'])                 ->name('products.index');  
    Route::match(['get', 'post'], 'create',           [ProductController::class, 'create'])                ->name('products.create');  
    Route::get('trash',                               [ProductController::class, 'attributes_trash'])      ->name('products_trash');  
    Route::post('store',                              [ProductController::class,'store'])                  ->name('products.store');
    Route::get('show/{id}',                           [ProductController::class,'show'])                   ->name('products.show');
    Route::get('edit/{id}',                           [ProductController::class,'edit'])                   ->name('products.edit');
    Route::put('update/{id}',                         [ProductController::class,'update'])                 ->name('products.update');
    Route::get('attribute-details/{id}',              [ProductController::class, 'getAttributeDetails'])   ->name('products.attributeDetails'); // Route để lấy chi tiết thuộc tính
});
Route::group(['prefix' => 'admin/attributes', 'middleware' => 'admin'], function () {
    Route::get('index',                       [AttributeController::class, 'index'])                       ->name('attributes.index');
    Route::get('delete/{id}',                 [AttributeController::class, 'destroy'])                     ->name('attributes.delete');
    Route::get('edit/{id}',                   [AttributeController::class, 'edit'])                        ->name('attributes.edit');
    Route::put('update/{id}',                 [AttributeController::class, 'update'])                      ->name('attributes.update');
    Route::match(['get', 'post'], 'create',   [AttributeController::class, 'create'])                      ->name('attributes.create');
    Route::post('store',                      [AttributeController::class, 'store'])                       ->name('attributes.store');
    Route::get('trash',                       [AttributeController::class, 'attributes_trash'])            ->name('attributes_trash');
    Route::put('restore/{id}',                [AttributeController::class, 'attributes_restore'])          ->name('attributes.restore');
    Route::get('/search',                      [AttributeController::class, 'search'])                      ->name('attributes.search');
    Route::post('data', [AttributeController::class, 'getData'])->name('attributes.data');


});
Route::group(['prefix' => 'admin/attributesdetail', 'middleware' => 'admin'], function () {
    Route::get('show/{id}',                   [AttributeDetailController::class, 'index'])                 ->name('attributeDetail.show');
    Route::get('delete/{id}',                 [AttributeDetailController::class, 'destroy'])               ->name('attributeDetail.delete');
    Route::get('edit/{id}',                   [AttributeDetailController::class, 'edit'])                  ->name('attributeDetail.edit');
    Route::put('update/{id}',                 [AttributeDetailController::class, 'update'])                ->name('attributeDetail.update');
    Route::get('create/{id}',                 [AttributeDetailController::class, 'create'])                ->name('attributeDetail.create');
    Route::post('store',                      [AttributeDetailController::class, 'store'])                 ->name('attributeDetail.store');
    Route::get('trash',                       [AttributeDetailController::class, 'attributes_trash'])      ->name('attributeDetail_trash');
    Route::put('restore/{id}',                [AttributeDetailController::class, 'restore'])               ->name('attributeDetail.restore');
});


Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::get('index', [DashboardController::class, 'index'])->name('dashboard.index');
});
// categories
Route::group(['prefix' => 'admin/categories', 'middleware' => 'admin'], function () {
    Route::get('index',                       [CategoryController::class, 'index'])                        ->name('categories.index');
    Route::get('delete/{id}',                 [CategoryController::class, 'destroy'])                      ->name('categories.delete');
    Route::get('edit/{id}',                   [CategoryController::class, 'edit'])                         ->name('categories.edit');
    Route::put('update/{id}',                 [CategoryController::class, 'update'])                       ->name('categories.update');
    Route::match(['get', 'post'], 'create',   [CategoryController::class, 'create'])                       ->name('categories.create');
    Route::post('store',                      [CategoryController::class, 'store'])                        ->name('categories.store');
    Route::get('trash',                       [CategoryController::class, 'categories_trash'])             ->name('categories_trash');
    Route::put('restore/{id}',                [CategoryController::class, 'restore'])                      ->name('categories.restore');
});


Route::get('admin', [AuthController::class, 'index'])->name('admin.login');
Route::post('login', [AuthController::class, 'login'])->name('login')->middleware(LoginMiddleware::class);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');
Route::post('register', [AuthController::class, 'register'])->name('register');
