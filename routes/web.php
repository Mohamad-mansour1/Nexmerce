<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\website\AboutController;
use App\Http\Controllers\website\AccountController;
use App\Http\Controllers\website\CartController;
use App\Http\Controllers\website\CheckoutController;
use App\Http\Controllers\website\ContactController;
use App\Http\Controllers\website\HomeController;
use App\Http\Controllers\website\OrderController as WebsiteOrderController;
use App\Http\Controllers\website\ProductController as WebsiteProductController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/about', [AboutController::class, 'about'])->name('about');
Route::get('/contact', [ContactController::class, 'contact'])->name('contact');
Route::get('/account', [AccountController::class, 'account'])->name('account');
Route::post('/account/edit', [AccountController::class, 'update'])->name('account.update');
Route::get('/categories/{categorySlug}', [WebsiteProductController::class, 'product'])->name('products');
Route::get('/products/{productSlug}', [WebsiteProductController::class, 'proudctDetails'])->name('productdetails');
Route::get('/cart', [CartController::class, 'cart'])->name('cart');
Route::post('/add-to-cart', [CartController::class, 'addToCart'])->name('cart.add');
Route::post('/cart/update', [CartController::class, 'updateCart'])->name('cart.update');
Route::post('/cart/remove', [CartController::class, 'removeCart'])->name('cart.remove');
Route::get('/checkout', [CheckoutController::class, 'checkout'])->name('checkout');
Route::post('/place-order', [WebsiteOrderController::class, 'placeOrder'])->name('order');




Route::prefix('admin')->group(function () {
    
    Route::get('/login', [AuthController::class ,'index'])->name('admin.loginview');
    Route::post('/loginpost', [AuthController::class ,'login'])->name('admin.login');
    Route::group(['middleware' => 'auth', 'middleware' => 'admin.auth'], function() {

        Route::get('/account', [AuthController::class, 'edit'])->name('admin.admin.account');
        Route::post('/edit', [AuthController::class, 'update'])->name('admin.admin.update');
        
        // Home
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
        
        Route::get('/categories', [CategoryController::class, 'index'])->name('admin.categories.index');
        Route::get('/category/create', [CategoryController::class, 'create'])->name('admin.categories.create');
        Route::post('/category/store', [CategoryController::class, 'store'])->name('admin.categories.store');
        Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('admin.categories.edit');
        Route::post('/category/update/{id}', [CategoryController::class, 'update'])->name('admin.categories.update');
        Route::get('/category/destroy/{id}', [CategoryController::class, 'destroy'])->name('admin.categories.destroy');

        
        Route::get('/products', [ProductController::class, 'index'])->name('admin.products.index');
        Route::get('/products/create', [ProductController::class, 'create'])->name('admin.products.create');
        Route::post('/products/store', [ProductController::class, 'store'])->name('admin.products.store');
        Route::get('/products/edit/{id}', [ProductController::class, 'edit'])->name('admin.products.edit');
        Route::post('/products/update/{id}', [ProductController::class, 'update'])->name('admin.products.update');
        Route::get('/products/destroy/{id}', [ProductController::class, 'destroy'])->name('admin.products.destroy');
        
        Route::get('/orders', [OrderController::class, 'index'])->name('admin.orders.index');
        Route::get('/orders/{id}', [OrderController::class, 'show'])->name('admin.orders.show');
        Route::get('/orders/update/{id}', [OrderController::class, 'update'])->name('admin.orders.update');

        Route::get('/logout', [AuthController::class, 'AdminLogout'])->name('admin.logout');

    });
});