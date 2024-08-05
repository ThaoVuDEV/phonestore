<?php

use App\Http\Controllers\AttributeController;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\CapacityController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ColorContrller;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DealOfTheWeekController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\FlashDealController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SpecialPriceController;
use App\Http\Middleware\LoginMiddleware;
use Illuminate\Support\Facades\Route;



Route::get('/',                                      [HomeController::class, 'index'])->name('home');
Route::get('/product/{id}',                          [HomeController::class, 'getProductList'])->name('getProList');

Route::get('/productdetail/{id}',                    [HomeController::class, 'getProductDetail'])->name('getProDetail');
Route::get('{id}/productdetail/',                    [HomeController::class, 'gettDetail'])->name('getProDetail1');

Route::get('/categories/{id}/products',              [HomeController::class, 'getProductList'])->name('getProList');
Route::post('/check-variant',                        [HomeController::class, 'checkVariant'])->name('check.variant');
Route::post('/get-product-variant',                  [HomeController::class, 'getProductVariant'])->name('getProductVariant');
Route::get('/test',                                  [HomeController::class, 'test']);


Route::prefix('cart')->group(function () {
    // Route thêm sản phẩm vào giỏ hàng
    Route::post('/add-to-cart',                       [CartController::class, 'addToCart'])->name('addToCart');
    route::get('/',                                   [CartController::class, 'viewCart'])->name('cart');
    Route::get('/cart',                               [CartController::class, 'showCart'])->name('showCart');
    Route::get('/checkout',                           [CartController::class, 'create'])->name('checkout.form')->middleware('check.order.status');
    Route::post('/checkout',                          [CartController::class, 'checkout'])->name('checkout');
    Route::delete('/remove/{id}',                     [CartController::class, 'removeFromCart'])->name('cart.remove');
    Route::get('/cart/items',                         [CartController::class, 'getCartItems'])->name('cart.items');
});
Route::post('/storeOrder',                            [CartController::class, 'storeOrder'])->name('storeOrder');
Route::get('/order-completed',                        [CartController::class, 'orderCompleted'])->name('order.completed');

//logadmin
Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::get('index',                               [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('index',                               [DashboardController::class, 'index'])->name('dashboard.index');
});



Route::group(['prefix' => 'admin/products', 'middleware' => 'admin'], function () {
    Route::get('index',                               [ProductController::class, 'index'])->name('products.index');
    Route::match(['get', 'post'], 'create',           [ProductController::class, 'create'])->name('products.create');
    Route::get('trash',                               [ProductController::class, 'products_trash'])->name('products_trash');
    Route::post('store',                              [ProductController::class, 'store'])->name('products.store');
    Route::get('show/{id}',                           [ProductController::class, 'show'])->name('products.show');
    Route::get('edit/{id}',                           [ProductController::class, 'edit'])->name('products.edit');
    Route::put('update/{id}',                         [ProductController::class, 'update'])->name('products.update');
    Route::get('delete/{id}',                         [ProductController::class, 'destroy'])->name('products.destroy');
    Route::put('restore/{id}',                        [ProductController::class, 'restore'])->name('products.restore');
    Route::get('attribute-details/{id}',              [ProductController::class, 'getAttributeDetails'])->name('products.attributeDetails'); // Route để lấy chi tiết thuộc tính
});
Route::get('/api/products/{product}/variants', [ProductController::class, 'getVariants']);

Route::group(['prefix' => 'admin/products/featured', 'middleware' => 'admin'], function () {
    Route::get('index',                               [ProductController::class, 'listProFeatured'])->name('products.featured.index');
    Route::match(['get', 'post'], 'create',           [ProductController::class, 'addFeatured'])->name('products.featured.create');
    Route::get('delete/{id}',                         [ProductController::class, 'destroy'])->name('products.featured.destroy');
});
Route::group(['prefix' => 'admin/products/on-sale', 'middleware' => 'admin'], function () {
    Route::get('index',                               [ProductController::class, 'listOnSale'])->name('products.on-sale.index');
    Route::match(['get', 'post'], 'create',           [ProductController::class, 'addOnSale'])->name('products.on-sale.create');
    Route::get('delete/{id}',                         [ProductController::class, 'destroy'])->name('products.on-sale.destroy');
});
Route::group(['prefix' => 'admin/products/best-sale', 'middleware' => 'admin'], function () {
    Route::get('index',                               [ProductController::class, 'index'])->name('products.best-sale.index');
    Route::match(['get', 'post'], 'create',           [ProductController::class, 'create'])->name('products.best-sale.create');
    Route::get('delete/{id}',                         [ProductController::class, 'destroy'])->name('products.best-sale.destroy');
});

// categories
Route::group(['prefix' => 'admin/categories', 'middleware' => 'admin'], function () {
    Route::get('index',                               [CategoryController::class, 'index'])->name('categories.index');
    Route::get('delete/{id}',                         [CategoryController::class, 'destroy'])->name('categories.delete');
    Route::get('edit/{id}',                           [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('update/{id}',                         [CategoryController::class, 'update'])->name('categories.update');
    Route::match(['get', 'post'], 'create',           [CategoryController::class, 'create'])->name('categories.create');
    Route::post('store',                              [CategoryController::class, 'store'])->name('categories.store');
    Route::get('trash',                               [CategoryController::class, 'categories_trash'])->name('categories_trash');
    Route::put('restore/{id}',                        [CategoryController::class, 'restore'])->name('categories.restore');
});

Route::resource('discounts', DiscountController::class);
Route::post('/apply-coupon', [DiscountController::class, 'applyCoupon'])->name('applyCoupon');


//
Route::resource('orders', OrderController::class);
Route::post('/order/confirm/{id}',                    [OrderController::class, 'confirmOrder'])->name('order.confirm');
Route::post('/order/ship/{id}',                       [OrderController::class, 'shipOrder'])->name('order.ship');
Route::post('/order/complete/{id}',                   [OrderController::class, 'completeOrder'])->name('order.complete');
//

Route::resource('banners', BannerController::class);




Route::group(['prefix' => 'admin/attributes', 'middleware' => 'admin'], function () {
    Route::resource('color', ColorContrller::class);
    Route::resource('special-prices', SpecialPriceController::class);
    Route::resource('flash-deals', FlashDealController::class);
    Route::resource('deals-of-the-week', DealOfTheWeekController::class);
    Route::resource('capacities', CapacityController::class);
});

//
Route::get('admin',                                   [AuthController::class, 'adminIndex'])->name('admin.login');
Route::post('adminLogin',                             [AuthController::class, 'adminLogin'])->name('adminLogin')->middleware(LoginMiddleware::class);
Route::post('logout',                                 [AuthController::class, 'logout'])->name('admin.logout');
Route::post('admin/register',                         [AuthController::class, 'register'])->name('admin.register');
Route::post('admin/signup',                           [AuthController::class, 'signup'])->name('admin.signup')->middleware(LoginMiddleware::class);
Route::post('userlogout',                             [AuthController::class, 'logout'])->name('Userlogout');
Route::middleware('auth')->group(function () {
    Route::get('/profile',                            [AuthController::class, 'ProfileUser'])->name('ProfileUser');
    
});
Route::get('/editprofile',                        [AuthController::class, 'ProfileEdit'])->name('ProfileEdit');

//logclient
Route::get('login',                                   [AuthController::class, 'userIndex'])->name('user.login');
Route::post('userLogin',                              [AuthController::class, 'UserLogin'])->name('userLogin');
Route::post('register',                               [AuthController::class, 'registerUser'])->name('userRegister');
Route::get('signup',                                  [AuthController::class, 'registerForm'])->name('user.signup');

//review
Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');