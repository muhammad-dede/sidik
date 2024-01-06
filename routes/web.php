<?php

use App\Http\Controllers\AjaxController;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BadanUsahaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IkmController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\KategoriProdukController;
use App\Http\Controllers\PengaturanController;
use App\Http\Controllers\PerusahaanController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\SatuanProduksiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::controller(WebController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/produk-ikm', 'produkIkm')->name('produk-ikm');
    Route::get('/produk-ikm/{id}', 'produkIkmDetail')->name('produk-ikm.detail');
    Route::get('/kontak', 'kontak')->name('kontak');
});

Route::controller(AuthController::class)->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('login', 'showLogin')->name('login');
        Route::post('login', 'login')->name('login');
    });
    Route::middleware('auth')->group(function () {
        Route::post('logout', 'logout')->name('logout');
    });
});

Route::middleware('auth')->group(function () {
    //
    Route::get('home', HomeController::class)->name('home');

    Route::resource('user', UserController::class)->except('show');
    Route::resource('jabatan', JabatanController::class)->except('show');
    Route::resource('badan-usaha', BadanUsahaController::class)->except('show');
    Route::resource('satuan-produksi', SatuanProduksiController::class)->except('show');
    Route::resource('kategori-produk', KategoriProdukController::class)->except('show');
    Route::resource('produk', ProdukController::class)->except('show');

    Route::resource('perusahaan', PerusahaanController::class);
    Route::resource('ikm', IkmController::class);

    Route::controller(PengaturanController::class)->group(function () {
        Route::get('pengaturan', 'edit')->name('pengaturan');
        Route::post('pengaturan', 'update')->name('pengaturan');
    });

    Route::controller(AkunController::class)->group(function () {
        Route::get('akun', 'edit')->name('akun');
        Route::post('akun', 'update')->name('akun');
    });

    Route::controller(AjaxController::class)->group(function () {
        Route::get('wilayah', 'wilayah')->name('wilayah');
    });
});
