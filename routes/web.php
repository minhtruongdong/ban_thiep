<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashBoardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProfileController as AdminProfileController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Client\CartController;
use App\Http\Controllers\Client\ClientController;
use App\Http\Controllers\Client\ClientProductController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\LoginController;
use App\Http\Middleware\CheckLogin;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



Route::prefix('auth')->name('auth.')->group(function(){
    Route::get('login',[LoginController::class,'showLogin'])->name('showLogin');
    Route::post('login',[LoginController::class,'login'])->name('login');

    Route::get('logout',[LoginController::class,'logout'])->name('logout');
});

// Route::middleware(CheckLogin::class)->group(function(){
    Route::prefix('admin') -> name('admin.' ) -> group(function(){
        Route::prefix('dash') -> name('dash.') ->controller(DashBoardController::class)->group(function(){
            Route::get('index','index')->name('index');
        });
        Route::prefix('profile') -> name('profile.') ->controller(AdminProfileController::class)->group(function(){
            Route::get('index','index')->name('index');
        });

        Route::prefix('category') -> name('category.') ->controller(CategoryController::class)->group(function(){
            Route::get('index','index')->name('index');

            Route::get('create','create')->name('create');
            Route::post('store', 'store')->name('store');

            Route::get('edit/{id}', 'edit')->name('edit');
            Route::post('update/{id}', 'update')->name('update');

            Route::get('destroy/{id}', 'destroy')->name('destroy');
        });

        Route::prefix('product') -> name('product.') ->controller(ProductController::class)->group(function(){
            Route::get('index','index')->name('index');

            Route::get('create','create')->name('create');
            Route::post('store', 'store')->name('store');

            Route::get('edit/{id}', 'edit')->name('edit');
            Route::post('update/{id}', 'update')->name('update');

            Route::get('destroy/{id}', 'destroy')->name('destroy');

            Route::post('upload-file/{id}', 'uploadFile')->name('uploadFile');
            Route::get('delete-file/{id}', 'deleteFile')->name('deleteFile');

            Route::get('search','search')->name('search');
        });

        Route::prefix('user') -> name('user.') ->controller(UserController::class)->group(function(){
            Route::get('index','index')->name('index');

            Route::get('create','create')->name('create');
            Route::post('store', 'store')->name('store');

            Route::get('edit/{id}', 'edit')->name('edit');
            Route::post('update/{id}', 'update')->name('update');

            Route::get('destroy/{id}', 'destroy')->name('destroy');
        });
    });
// });




Route::middleware(['web'])->group(function () {
    Route::prefix('client')->name('client.')->group(function(){
        Route::get('index',[ClientController::class,'index'])->name('index');
        Route::get('about',[ClientController::class,'about'])->name('about');
        Route::get('contact',[ClientController::class,'contact'])->name('contact');
        Route::get('savePrice',[ClientController::class,'savePrice'])->name('savePrice');

        Route::get('/them-gio-hang/{id}/{quantity}',[CartController::class,'addToCart'])->name('addToCart');
        Route::get('/gio-hang',[CartController::class,'cart'])->name('cart');
        Route::get('xoa-gio-hang/{id}',[CartController::class,'cartDelete'])->name('cartDelete');
        Route::post('cap-nhat-gio-hang',[CartController::class,'cartUpdate'])->name('cartUpdate');
        Route::get('/thanh-toan',[CartController::class,'checkout'])->name('checkout');
        Route::post('/thanh-toan',[CartController::class,'checkoutPost'])->name('checkoutPost');
        Route::post('/thanh-toan-vnpay',[CartController::class,'checkoutvnpay_payment'])->name('checkoutvnpay_payment');

        Route::prefix('product') -> name('product.') ->controller(ClientProductController::class)->group(function(){
            Route::get('/the-loai/{id}','category')->name('category');
            Route::get('/chi-tiet-san-pham/{id}','productdetail')->name('productdetail');
            Route::post('/save-custom-image/{id}', 'saveCustomImage')->name('saveCustomImage');
            Route::post('/save_image_localhost/{id}','uploadImage')->name('uploadImage');
        });


        Route::get('/cart', [ClientProductController::class, 'showCart'])->name('cart');
        Route::get('/check-session', function () {
            $cart = session('cart');
            $cartDetail = session('cart_detail');

            return response()->json([
                'cart' => $cart,
                'cartDetail' => $cartDetail,
            ]);
        });


    });
});

// Route::get('/cart/total', [CartController::class, 'getCartTotal'])->name('client.getCartTotal');


