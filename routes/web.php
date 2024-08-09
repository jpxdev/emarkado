<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{AuthController, ProfileController, UserController, VendorController};
use App\Http\Controllers\Vendor\{VendorAuthController};
use App\Http\Middleware\AdminAuth;

Route::get('/', function () {
    return view('admin.auth.login');
});

//ADMIN FUNCTIONS
Route::get('/admin/login', [AuthController::class, 'getLogin'])->name('getLogin');
Route::post('/admin/login', [AuthController::class, 'postLogin'])->name('postLogin');
Route::post('/admin/logout', [AuthController::class, 'adminLogout'])->name('adminLogout');

//VENDOR FUNCTIONS
Route::get('/vendor/login', [VendorAuthController::class, 'getVendorLogin'])->name('getVendorLogin');
Route::post('/vendor/login', [VendorAuthController::class, 'postVendorLogin'])->name('postVendorLogin');
Route::get('/vendor/dashboard', [VendorAuthController::class, 'dashboard'])->name('vendor-dashboard');

//Route::group(['middleware'=>['admin_auth']],function(){});

Route::middleware([AdminAuth::class])->group(function () {
    Route::get('/admin/dashboard', [ProfileController::class, 'dashboard'])->name('admin-dashboard');
    Route::get('/admin/vendor', [UserController::class, 'vendor'])->name('pages.vendor');
    Route::get('/admin/merchant', [UserController::class, 'merchant'])->name('pages.merchant');
    Route::get('/admin/vendor/create_vendor', [UserController::class, 'create_vendor'])->name('pages.create_vendor');
    Route::post('/admin/merchant', [UserController::class, 'add_merchant'])->name('create.merchant');
    Route::post('/admin/vendor', [VendorController::class, 'add_vendor'])->name('create.vendor');
    Route::get('/admin/merchant/create_merchant', [UserController::class, 'create_merchant'])->name('pages.create_merchant');
    Route::get('/admin/buyer', [UserController::class, 'buyer'])->name('pages.buyer');
});




//TEMPLATE FUNCTIONS (from the original template. it might broke something if this code be remove.)
Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::view('about', 'about')->name('about');

    Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');

    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
});
