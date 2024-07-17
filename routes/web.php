<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\LoginMiddleware;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index']);


Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::get('index', [DashboardController::class, 'index'])->name('dashboard.index');
});
// categories
Route::group(['prefix' => 'admin/categories', 'middleware' => 'admin'], function () {
    Route::get('index',                    [CategoryController::class, 'index'])           ->name('categories.index');
    Route::get('delete/{id}',              [CategoryController::class, 'destroy'])         ->name('category.delete');
    Route::get('edit/{id}',                [CategoryController::class, 'edit'])            ->name('category.edit');
    Route::put('update/{id}',              [CategoryController::class, 'update'])          ->name('category.update');
    Route::match(['get', 'post'], 'create',[CategoryController::class, 'create'])          ->name('category.create');
    Route::post('store',                   [CategoryController::class, 'store'])           ->name('category.store');
    Route::get('trash',                    [CategoryController::class, 'categories_trash'])->name('categories_trash');
    Route::put('restore/{id}',             [CategoryController::class, 'restore'])         ->name('categories.restore');
});


Route::get('admin', [AuthController::class, 'index'])->name('admin.login');
Route::post('login', [AuthController::class, 'login'])->name('login')->middleware(LoginMiddleware::class);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');
Route::post('register', [AuthController::class, 'register'])->name('register');
