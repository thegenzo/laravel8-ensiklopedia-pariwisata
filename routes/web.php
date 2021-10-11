<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HotelController;
use App\Http\Controllers\Admin\WisataController;
use App\Http\Controllers\Admin\KulinerController;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\CekHotelController;
use App\Http\Controllers\CekWisataController;
use App\Http\Controllers\CekKulinerController;


// Route::group(['middleware' => ['auth', 'ceklevel:admin,guest']], function() {
//     Route::get('/', [HomeController::class, 'index']);
    

// });


Route::get('login', [AuthController::class, 'showFormLogin'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('logout', [AuthController::class, 'logout']);

Route::group(['middleware' => ['auth', 'ceklevel:admin']], function() {
    Route::get('admin/dashboard', [DashboardController::class, 'index']);

    Route::resource('wisata', WisataController::class);

    Route::resource('kuliner', KulinerController::class);

    Route::resource('hotel', HotelController::class);

    Route::resource('admin', AdminController::class);
});

Route::view('/', 'pages.home')->name('home');

Route::get('lihat-wisata', [CekWisataController::class, 'index']);

Route::get('lihat-wisata/{id}', [CekWisataController::class, 'show']);

Route::get('/search/lihat-wisata', [CekWisataController::class, 'search']);

Route::get('lihat-kuliner', [CekKulinerController::class, 'index']);

Route::get('lihat-kuliner/{id}', [CekKulinerController::class, 'show']);

Route::get('/search/lihat-kuliner', [CekKulinerController::class, 'search']);

Route::get('lihat-hotel', [CekHotelController::class, 'index']);

Route::get('lihat-hotel/{id}', [CekHotelController::class, 'show']);

Route::get('/search/lihat-hotel', [CekHotelController::class, 'search']);

