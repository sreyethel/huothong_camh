<?php

use App\Http\Controllers\Website\AuthController;
use App\Http\Controllers\Website\HomeController;
use App\Http\Controllers\Website\PageController;
use App\Http\Controllers\Website\ProductController;
use App\Http\Controllers\Website\UserController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Route::name('website-')
    ->group(function () {
        Route::controller(HomeController::class)
            ->group(function () {
                Route::get('/', 'onHome')->name('home');;
        });

        // Product
        Route::controller(ProductController::class)
            ->prefix('product')
            ->name('product-')
            ->group(function () {
                Route::get('/', 'onIndex')->name('index');
                Route::get('/{slug}', 'onDetail')->name('detail');
                Route::middleware(['WebGuard'])->group(function () {
                    Route::post('/order/store', 'onOrderStore')->name('order-store');
                    Route::get('/favorite/get', 'onFavorite')->name('favorite');
                    Route::post('/favorite/store', 'onFavoriteStore')->name('favorite-store');
                });
        });

        // Page
        Route::controller(PageController::class)
            ->prefix('page')
            ->name('page-')
            ->group(function () {
                Route::get('/about-us', 'onAboutUs')->name('about-us');
                Route::get('/contact-us', 'onContactUs')->name('contact-us');
        });

        // authentication
        Route::controller(AuthController::class)
            ->prefix('auth')
            ->name('auth-')
            ->group(function () {
                Route::get('/sign-in', 'onSignIn')->name('sign-in');
                Route::post('/sign-in', 'onAccessSignIn')->name('access-sign-in');
                Route::get('/sign-up', 'onSignUp')->name('sign-up');
                Route::post('/sign-up', 'onSignUpStore')->name('sign-up-store');
                Route::get('/forgot-password', 'onForgotPassword')->name('forgot-password');
                Route::post('/request-otp', 'onRequestOTP')->name('request-otp');
                Route::post('/forgot-password', 'onResetPassword')->name('reset-password');
                Route::get('/sign-out', 'onSignOut')->name('sign-out');
        });

        // User
        Route::controller(UserController::class)
            ->prefix('user')
            ->name('user-')
            ->middleware('WebGuard')
            ->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('/profile', 'onProfile')->name('profile');
                Route::get('/order', 'onOrder')->name('order');
                Route::post('/order/status', 'onOrderStatus')->name('order-status');
                Route::post('/order/remove', 'onOrderRemove')->name('order-remove');
                Route::post('/profile', 'onProfileStore')->name('profile-store');
                Route::get('/favorite', 'onFavorite')->name('favorite');
                Route::get('/change-password', 'onChangePassword')->name('change-password');
                Route::post('/change-password', 'onChangePasswordStore')->name('change-password-store');
        });

    });


// clear cache
Route::get('/clear-cache', function () {
    Artisan::call('optimize:clear');
    return 'Cache is cleared';
});