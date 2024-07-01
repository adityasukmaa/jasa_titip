<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CabangController;
use App\Http\Controllers\DashbaordController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\KurirController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\TokoController;
use App\Http\Controllers\TopUpController;
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



Route::get('admin/login', [AuthController::class, 'loginPage'])->name('loginPage')->middleware('guest');
Route::post('admin/login', [AuthController::class, 'login'])->name('login')->middleware('guest');

Route::prefix('/admin')->middleware('auth')->group(function(){
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/ganti-password', [AuthController::class, 'changePassword'])->name('admin.changePassword');

    Route::get('/dashboard', [DashbaordController::class, 'index'])->name('admin.home');

    Route::middleware('superadmin')->group(function(){
        Route::get('/cabang', [CabangController::class, 'index'])->name('admin.cabang');
        Route::get('/admin', [AdminController::class, 'index'])->name('admin.admin');
        Route::get('/setting', [SettingController::class, 'index'])->name('admin.setting');
        Route::get('/admin-topup', [TopUpController::class, 'superadmin'])->name('admin.adminTopup');

    });
    Route::get('/kurir', [KurirController::class, 'index'])->name('admin.kurir');
    Route::get('/toko', [TokoController::class, 'index'])->name('admin.toko');
    Route::get('/toko/{toko}/produk', [ProductController::class, 'index'])->name('admin.product');
    Route::get('/iklan', [AdsController::class, 'index'])->name('admin.ads');
    Route::get('/order', [OrderController::class, 'index'])->name('admin.order');
    Route::get('/laporan-admin', [ReportController::class, 'admin'])->name('admin.admin_report');
    Route::get('/laporan-kurir', [ReportController::class, 'courir'])->name('admin.courir_report');
    Route::get('/kurir-topup', [TopUpController::class, 'admin'])->name('admin.kurirTopup');

});

Route::get('/', [FrontController::class, 'apkIndex'])->name('front.home');
Route::get('/home', [FrontController::class, 'index'])->name('front.index');

// Toko
Route::get('/toko/login', [TokoController::class, 'login'])->name('toko.login');
Route::post('/toko/login', [TokoController::class, 'auth'])->name('toko.auth');
Route::get('/toko/dashboard', [TokoController::class, 'dashboard'])->name('toko.dashboard');
Route::get('/toko/product', [TokoController::class, 'product'])->name('toko.product');
Route::get('/toko/toggle-status', [TokoController::class, 'toggleStatus'])->name('toko.toggleStatus');


Route::get('/item', [FrontController::class, 'searchRes'])->name('front.searchRes');
Route::get('/cabang', [FrontController::class, 'cabangRes'])->name('front.cabangRes');
Route::get('/toko/{slug}', [FrontController::class, 'catalog'])->name('front.catalog');
Route::get('/order', [FrontController::class, 'order'])->name('front.order');
Route::get('/order-success', [FrontController::class, 'confirm'])->name('front.orderSuccess');

// Kurir
Route::get('/cek-saldo', [KurirController::class, 'cekSaldoPage'])->name('courir.cekSaldo');
Route::post('/cek-saldo/auth', [KurirController::class, 'auth'])->name('courir.auth');
Route::get('/toggle-status', [KurirController::class, 'toggleStatus'])->name('courir.toggleStatus');

// Toko




