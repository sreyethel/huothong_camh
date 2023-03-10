<?php

use App\Http\Controllers\Admin as Admin;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\MediaController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\ProductColorController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SliderController;
use App\Services\FileManager;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
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

Route::get('clear-cache', function () {
    Artisan::call('optimize:clear');
    return "Cache is cleared";
});

Route::get("/change-locale/{locale}", [Admin\ChangeLocaleController::class, 'changeLocale'])->name('change-locale');
Route::middleware(['locale'])->group(function () {
    // Auth
    Route::prefix('auth')->group(function () {
        Route::get('/', function () {
            return redirect()->route('admin-login');
        });
        Route::get('/login', [Admin\AdminController::class, 'login'])->name('login');
        Route::post('/login/post', [Admin\AuthController::class, 'login'])->name('login-post');
        Route::get('/sign-out', [Admin\AuthController::class, 'signOut'])->name('sign-out');
    });

    Route::middleware(['AdminGuard'])->group(function () {
        Route::get('seeder', function () {
            Artisan::call('db:seed');
            return "DB Seed success";
        });
        Route::get('migrate', function () {
            Artisan::call('migrate');
            return 'Migrate success';
        });
        Route::get('optimize', function () {
            Artisan::call('optimize:clear');
            return 'Optimize success';
        });

        Route::get('/', function () {
            return redirect()->route('admin-dashboard');
        });
        Route::get('/dashboard', [Admin\DashboardController::class, 'index'])->name('dashboard');
        
        // Admin
        Route::prefix('admin')
            ->controller(AdminController::class)
            ->name('admin-')
            ->group(function () {
                Route::get('list',  'index')->name('list');
                Route::get('data',  'data')->name('data');
                Route::post('save',  'onSave')->name('save');
                Route::post('update',  'onUpdate')->name('update');
                Route::post('status',  'onUpdateStatus')->name('status');
                Route::post('save-password',  'onSavePassword')->name('save-password');
                Route::delete('delete',  'onDelete')->name('delete');
                Route::put('restore',  'onRestore')->name('restore');
                
                // userPermission
                Route::get('user-permission',  'userPermission')->name('user-permission');
                Route::post('user-permission-save',  'userPermissionSave')->name('user-permission-save');
        });

        //File Manager
        Route::prefix('file-manager')->name('file-manager-')->group(function () {
            Route::get('/index', [FileManager::class, 'index'])->name('index');
            Route::get('/first', [FileManager::class, 'first'])->name('first');
            Route::get('/files', [FileManager::class, 'getFiles'])->name('files');
            Route::get('/folders', [FileManager::class, 'getFolders'])->name('folders');
            Route::post('/upload', [FileManager::class, 'uploadFile'])->name('upload');
            Route::post('/rename-file', [FileManager::class, 'renameFile'])->name('rename-file');
            Route::delete('/delete-file', [FileManager::class, 'deleteFile'])->name('delete-file');

            //folder
            Route::post('/create-folder', [FileManager::class, 'createFolder'])->name('create-folder');
            Route::post('/rename-folder', [FileManager::class, 'renameFolder'])->name('rename-folder');
            Route::delete('/delete-folder', [FileManager::class, 'deleteFolder'])->name('delete-folder');

            //trash bin
            Route::delete('/delete-all', [FileManager::class, 'deleteAll'])->name('delete-all');
            Route::put('/restore-all', [FileManager::class, 'restoreAll'])->name('restore-all');
        });

        // Slider
        Route::prefix('slider')
            ->controller(SliderController::class)
            ->name('slider-')
            ->group(function () {
                Route::get('list', 'index')->name('list');
                Route::get('data', 'data')->name('data');
                Route::get('/ordering', 'getOrdering')->name('ordering');
                Route::post('store', 'onStore')->name('store');
                Route::post('update', 'onUpdate')->name('update');
                Route::post('status', 'onUpdateStatus')->name('status');
        });

        // Category
        Route::prefix('category')
            ->controller(CategoryController::class)
            ->name('category-')
            ->group(function () {
                Route::get('list', 'index')->name('list');
                Route::get('data', 'data')->name('data');
                Route::post('store', 'onStore')->name('store');
                Route::delete('delete', 'onDelete')->name('delete');
                Route::put('restore', 'onRestore')->name('restore');
                Route::post('status', 'onUpdateStatus')->name('status');
        });

        // Product
        Route::prefix('product')
            ->controller(ProductController::class)
            ->name('product-')
            ->group(function () {
                Route::get('list', 'index')->name('list');
                Route::get('data', 'data')->name('data');
                Route::post('save', 'onSave')->name('save');
                Route::delete('bulk-hide-show', 'bulkHideShow')->name('bulk-hide-show');
                Route::post('save-single-option', 'saveSingleOption')->name('saveSingleOption');
                Route::get('fetch-data', 'fetchProduct')->name('fetch-data');
                Route::delete('delete',  'onDelete')->name('delete');
                Route::put('restore',  'onRestore')->name('restore');
                Route::delete('destroy',  'onDestroy')->name('destroy');
                
                Route::get('category/option', 'onCategoryOption')->name('category-option');
        });

        // Product Color
        Route::prefix('product/color')
            ->controller(ProductColorController::class)
            ->name('product-color-')
            ->group(function () {
                Route::get('list', 'index')->name('list');
                Route::get('data', 'data')->name('data');
                Route::post('save', 'onSave')->name('save');
                Route::delete('bulk-hide-show', 'bulkHideShow')->name('bulk-hide-show');
                Route::post('save-single-option', 'saveSingleOption')->name('saveSingleOption');
                Route::get('fetch-data', 'fetchProductColor')->name('fetch-data');
        });

        // Blog
        Route::prefix('blog')
            ->controller(BlogController::class)
            ->name('blog-')
            ->group(function () {
                Route::get('list', 'index')->name('list');
                Route::get('data', 'data')->name('data');
                Route::post('save', 'onSave')->name('save');
                Route::delete('bulk-hide-show', 'bulkHideShow')->name('bulk-hide-show');
                Route::post('save-single-option', 'saveSingleOption')->name('saveSingleOption');
                Route::get('fetch-data', 'fetchBlog')->name('fetch-data');
                Route::delete('delete',  'onDelete')->name('delete');
                Route::put('restore',  'onRestore')->name('restore');
                Route::delete('destroy',  'onDestroy')->name('destroy');
        });

        // Media
        Route::prefix('media')
            ->controller(MediaController::class)
            ->name('media-')
            ->group(function () {
                Route::get('list', 'index')->name('list');
                Route::get('data', 'data')->name('data');
                Route::post('save', 'onSave')->name('save');
                Route::delete('bulk-hide-show', 'bulkHideShow')->name('bulk-hide-show');
                Route::post('save-single-option', 'saveSingleOption')->name('saveSingleOption');
                Route::get('fetch-data', 'fetchMedia')->name('fetch-data');
                Route::delete('delete',  'onDelete')->name('delete');
                Route::put('restore',  'onRestore')->name('restore');
                Route::delete('destroy',  'onDestroy')->name('destroy');
        });

        // Partner
        Route::prefix('partner')
            ->controller(PartnerController::class)
            ->name('partner-')
            ->group(function () {
                Route::get('list', 'index')->name('list');
                Route::get('data', 'data')->name('data');
                Route::post('save', 'onSave')->name('save');
                Route::delete('bulk-hide-show', 'bulkHideShow')->name('bulk-hide-show');
                Route::post('save-single-option', 'saveSingleOption')->name('saveSingleOption');
                Route::get('fetch-data', 'fetchPartner')->name('fetch-data');
        });

        /// Setting
        Route::prefix('setting')->name('setting-')->group(function () {
            Route::get('/{page}', [Admin\PageController::class, 'onPage'])->name('page');
            Route::post('save-page', [Admin\PageController::class, 'onSave'])->name('page-update');
            Route::get('/page-data/{type}', [Admin\PageController::class, 'getData'])->name('page-data');
            Route::post('save-contact', [Admin\PageController::class, 'onSaveContact'])->name('save-contact');
        });

    });
});