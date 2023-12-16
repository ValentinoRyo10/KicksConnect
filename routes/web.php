<?php

use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('login');
// });


Route::controller(App\Http\Controllers\FrontEnd\FrontendController::class)->group(function() {
    Route::get('/', 'index');

    // Collections
    Route::get('/collections', 'categories');
    Route::get('/collections/{category_slug}', 'products');
    Route::get('/collections/{category_slug}/{product_slug}', 'productView');

    // New Arrivals
    Route::get('/new-arrivals', 'newArrival');

    // Featured Products
    Route::get('/featured-products', 'featuredProducts');

    // Search Bar
    Route::get('search', 'searchProducts');
});

Route::middleware(['auth'])->group(function () {

    Route::controller(App\Http\Controllers\FrontEnd\WishlistController::class)->group(function() {
        Route::get('wishlist', 'index');
    });

    Route::controller(App\Http\Controllers\Frontend\CartController::class)->group(function() {
        Route::get('cart', 'index');
    });

    Route::controller(App\Http\Controllers\Frontend\CheckoutController::class)->group(function() {
        Route::get('checkout', 'index');
    });

    Route::get('/thank-you', [App\Http\Controllers\Frontend\FrontendController::class, 'thankyou']);


    Route::controller(App\Http\Controllers\Frontend\OrderController::class)->group(function() {
        Route::get('orders', 'index');
        Route::get('orders/{orderId}', 'show');
    });

    // Route::controller(FrontendUserController::class)->group(function() {
    //     Route::get('profile', 'index');
    //     Route::post('profile', 'update');
    //     Route::get('change-password', 'passwordCreate');
    //     Route::post('change-password', 'changePassword');
    // });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function() {
    
    Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);

    Route::controller(App\Http\Controllers\Admin\SliderController::class)->group(function() {
        Route::get('sliders', 'index');
        Route::get('sliders/create', 'create');
        Route::post('sliders/create', 'store');
        Route::get('sliders/edit/{slider_id}', 'edit');
        Route::put('sliders/{slider_id}', 'update');
        Route::get('sliders/delete/{slider_id}', 'destroy');
    });

    Route::controller(App\Http\Controllers\Admin\CategoryController::class)->group(function () {
        Route::get('/category', 'index');
        Route::get('/category/create', 'create');
        Route::post('/category', 'store');
        Route::get('/category/{category}/edit', 'edit');
        Route::put('category/{category}', 'update');
    });

    Route::controller(App\Http\Controllers\Admin\ProductController::class)->group(function () {
        Route::get('/products', 'index');
        Route::get('/products/create', 'create');
        Route::post('/products', 'store');
        Route::get('/products/{products}/edit', 'edit');
        Route::put('/products/{products}', 'update');
        Route::get('product/delete/{product_id}', 'destroy');
        Route::get('product-image/delete/{product_image_id}', 'destroyImage');

        Route::post('product-color/{prod_color_id}', 'updateProdColorQty');
        Route::get('product-color/delete/{prod_color_id}', 'deleteProdColor');
    });

    Route::get('/brands', App\Http\Livewire\Admin\Brand\Index::class);

    Route::controller(App\Http\Controllers\Admin\ColorController::class)->group(function () {
        Route::get('/colors', 'index');
        Route::get('/colors/create', 'create');
        Route::post('/colors/create', 'store');
        Route::get('/colors/{color}/edit', 'edit');
        Route::put('/colors/{color_id}', 'update');
        Route::get('/colors/{color_id}/delete', 'destroy');
    });
});
