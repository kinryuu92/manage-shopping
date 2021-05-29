<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\BackEnd\AdminPermissionController;
use App\Http\Controllers\BackEnd\AdminProductController;
use App\Http\Controllers\BackEnd\AdminRoleController;
use App\Http\Controllers\BackEnd\AdminSettingController;
use App\Http\Controllers\BackEnd\AdminSliderController;
use App\Http\Controllers\BackEnd\AdminUserController;
use App\Http\Controllers\BackEnd\CategoryController;
use App\Http\Controllers\FrontEnd\FrontEndController;
use App\Http\Controllers\FrontEnd\MailController;
use App\Http\Controllers\FrontEnd\LoginRegisterController;
use App\Http\Controllers\FrontEnd\CartController;



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

Route::get('/',[FrontEndController::class, 'index'])->name('home.index');
Route::get('/product-detail/{id}',[FrontEndController::class, 'details'])->name('home.details');
Route::post('/search',[FrontEndController::class, 'search'])->name('home.search');
Route::get('/product-category/{slug}/{id}',[FrontEndController::class, 'productCategory'])->name('indexProduct');

//Cart
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/add-cart', [CartController::class, 'addCart'])->name('cart.add');
Route::post('/update-cart', [CartController::class, 'updateCart'])->name('cart.update');
Route::get('/delete-cart/{session_id}', [CartController::class, 'deleteCart'])->name('cart.delete');

//send Mail
Route::get('/send-mail', [MailController::class, 'send_mail']  );
//login and register
Route::get('/login-register', [LoginRegisterController::class, 'index'])->name('login_register.index');

//google login
Route::get('login/google', [LoginRegisterController::class, 'redirectToGoogle'])
    ->name('login.google');
Route::get('/login/google/callback', [LoginRegisterController::class, 'handleGoogleCallBack']);

//Facebook login
Route::get('login/facebook', [LoginRegisterController::class, 'redirectToFacebook'])
    ->name('login.facebook');
Route::get('/login/facebook/callback', [LoginRegisterController::class, 'handleFacebookCallBack']);



Route::get('/admin', function () {
    return view('admin');
});

Route::prefix('admin')->group(function () {
    Route::prefix('categories')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])
            ->name('categories.index')
            ->middleware('can:category-list');
        Route::get('/create', [CategoryController::class, 'create'])
            ->name('categories.create')
            ->middleware('can:category-add');
        Route::post('/store', [CategoryController::class, 'store'])->name('categories.store');
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])
            ->name('categories.edit')
            ->middleware('can:category-edit');
        Route::post('/update/{id}', [CategoryController::class, 'update'])->name('categories.update');
        Route::get('/delete/{id}', [CategoryController::class, 'delete'])
            ->name('categories.delete')
            ->middleware('can:category-delete');
    });

    Route::prefix('products')->group(function () {
        Route::get('/', [AdminProductController::class, 'index'])
            ->name('products.index')
            ->middleware('can:product-list');
        Route::get('/create', [AdminProductController::class, 'create'])
            ->name('products.create')
            ->middleware('can:product-add');
        Route::post('/store', [AdminProductController::class, 'store'])->name('products.store');
        Route::get('/edit/{id}', [AdminProductController::class, 'edit'])
            ->name('products.edit')
            ->middleware('can:product-edit');
        Route::post('/update/{id}', [AdminProductController::class, 'update'])->name('products.update');
        Route::get('/delete/{id}', [AdminProductController::class, 'delete'])
            ->name('products.delete')
            ->middleware('can:product-delete');
    });

    Route::prefix('sliders')->group(function () {
        Route::get('/', [AdminSliderController::class, 'index'])
            ->name('sliders.index')
            ->middleware('can:slider-list');
        Route::get('/create', [AdminSliderController::class, 'create'])
            ->name('sliders.create')
            ->middleware('can:slider-add');;
        Route::post('/store', [AdminSliderController::class, 'store'])->name('sliders.store');
        Route::get('/edit/{id}', [AdminSliderController::class, 'edit'])
            ->name('sliders.edit')
            ->middleware('can:slider-edit');
        Route::post('/update/{id}', [AdminSliderController::class, 'update'])->name('sliders.update');
        Route::get('/delete/{id}', [AdminSliderController::class, 'delete'])
            ->name('sliders.delete')
            ->middleware('can:slider-delete');
    });

    Route::prefix('settings')->group(function () {
        Route::get('/', [AdminSettingController::class, 'index'])
            ->name('settings.index')
            ->middleware('can:setting-list');
        Route::get('/create', [AdminSettingController::class, 'create'])
            ->name('settings.create')
            ->middleware('can:setting-add');
        Route::post('/store', [AdminSettingController::class, 'store'])->name('settings.store');
        Route::get('/edit/{id}', [AdminSettingController::class, 'edit'])
            ->name('settings.edit')
            ->middleware('can:setting-edit');
        Route::post('/update/{id}', [AdminSettingController::class, 'update'])->name('settings.update');
        Route::get('/delete/{id}', [AdminSettingController::class, 'delete'])
            ->name('settings.delete')
            ->middleware('can:setting-delete');
    });

    Route::prefix('users')->group(function () {
        Route::get('/', [AdminUserController::class, 'index'])
            ->name('users.index')
            ->middleware('can:user-list');
        Route::get('/create', [AdminUserController::class, 'create'])
            ->name('users.create')
            ->middleware('can:user-add');
        Route::post('/store', [AdminUserController::class, 'store'])->name('users.store');
        Route::get('/edit/{id}', [AdminUserController::class, 'edit'])
            ->name('users.edit')
            ->middleware('can:user-edit');
        Route::post('/update/{id}', [AdminUserController::class, 'update'])->name('users.update');
        Route::get('/delete/{id}', [AdminUserController::class, 'delete'])
            ->name('users.delete')
            ->middleware('can:user-delete');
    });

    Route::prefix('roles')->group(function () {
        Route::get('/', [AdminRoleController::class, 'index'])
            ->name('roles.index')
            ->middleware('can:role-list');
        Route::get('/create', [AdminRoleController::class, 'create'])
            ->name('roles.create')
            ->middleware('can:role-add');
        Route::post('/store', [AdminRoleController::class, 'store'])->name('roles.store');
        Route::get('/edit/{id}', [AdminRoleController::class, 'edit'])
            ->name('roles.edit')
            ->middleware('can:role-edit');
        Route::post('/update/{id}', [AdminRoleController::class, 'update'])->name('roles.update');
        Route::get('/delete/{id}', [AdminRoleController::class, 'delete'])
            ->name('roles.delete')
            ->middleware('can:role-delete');
    });

    Route::prefix('permissions')->group(function () {
        Route::get('/create', [AdminPermissionController::class, 'create'])->name('permissions.create');
        Route::post('/store', [AdminPermissionController::class, 'store'])->name('permissions.store');
    });

});

Auth::routes();
Route::get('/admin', [HomeController::class, 'index'])->name('admin');
Route::get('/logout', [HomeController::class, 'logout'])->name('logout');


