<?php
use App\Http\Controllers\Website\HomeController;
use App\Http\Controllers\Website\PageController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Route::name('website-')
    ->group(function () {
        Route::controller(HomeController::class)
            ->group(function () {
                Route::get('/', 'onHome')->name('home');;
        });

        // Page
        Route::controller(PageController::class)
            ->prefix('page')
            ->name('page-')
            ->group(function () {
                Route::get('/about-us', 'onAboutUs')->name('about-us');
                Route::get('/contact-us', 'onContactUs')->name('contact-us');
        });

    });


// clear cache
Route::get('/clear-cache', function () {
    Artisan::call('optimize:clear');
    return 'Cache is cleared';
});