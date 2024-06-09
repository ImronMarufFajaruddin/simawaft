<?php

use App\Models\Admin\KategoriBerita;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\InstansiController;
use App\Http\Controllers\Admin\UserAdminController;
use App\Http\Controllers\Admin\UserSettingController;
use App\Http\Controllers\Admin\KategoriBeritaController;
use App\Http\Controllers\Admin\KategoriInstansiController;
use App\Http\Controllers\Admin\LevelJabatanController;
use App\Http\Controllers\Landings\LandingController;
use App\Http\Controllers\Landing\LandingBeritaController;

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

/** for side bar menu active */
// function set_active($route)
// {
//     if (is_array($route)) {
//         return in_array(Request::path(), $route) ? 'active' : '';
//     }
//     return Request::path() == $route ? 'active' : '';
// }

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();
// ===== Administrator Route ===== //

Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::prefix('data-user')->middleware('can:superadmin-only')->group(function () {
        Route::get('/', [UserAdminController::class, 'index'])->name('data-user.index');
        Route::post('/store', [UserAdminController::class, 'store'])->name('data-user.store');
        Route::delete('/destroy/{id}', [UserAdminController::class, 'destroy'])->name('data-user.destroy');
        Route::get('/edit/{id}', [UserAdminController::class, 'edit'])->name('data-user.edit');
        Route::put('/update/{id}', [UserAdminController::class, 'update'])->name('data-user.update');
    });

    Route::prefix('data-instansi')->middleware('can:superadmin-only')->group(function () {
        Route::get('/', [InstansiController::class, 'index'])->name('data-instansi.index');
        Route::post('/store', [InstansiController::class, 'store'])->name('data-instansi.store');
        Route::get('/edit/{id}', [InstansiController::class, 'edit'])->name('data-instansi.edit');
        Route::put('/update/{id}', [InstansiController::class, 'update'])->name('data-instansi.update');
        Route::delete('/destroy/{id}', [InstansiController::class, 'destroy'])->name('data-instansi.destroy');
    });

    Route::prefix('data-kategori-instansi')->middleware('can:superadmin-only')->group(function () {
        Route::get('/', [KategoriInstansiController::class, 'index'])->name('data-kategori-instansi.index');
        Route::post('/store', [KategoriInstansiController::class, 'store'])->name('data-kategori-instansi.store');
        Route::get('/edit/{id}', [KategoriInstansiController::class, 'edit'])->name('data-kategori-instansi.edit');
        Route::put('/update/{id}', [KategoriInstansiController::class, 'update'])->name('data-kategori-instansi.update');
        Route::delete('/destroy/{id}', [KategoriInstansiController::class, 'destroy'])->name('data-kategori-instansi.destroy');
    });

    Route::group(['prefix' => 'user-setting'], function () {
        Route::get('/', [UserSettingController::class, 'index'])->name('user-setting.index');
        Route::post('/store', [UserSettingController::class, 'store'])->name('user-setting.store');
        Route::get('/edit/{id}', [UserSettingController::class, 'edit'])->name('user-setting.edit');
        Route::post('/update', [UserSettingController::class, 'update'])->name('user-setting.update');
        Route::delete('/destroy/{id}', [UserSettingController::class, 'destroy'])->name('user-setting.destroy');
    });

    Route::group(['prefix' => 'data-kategori-berita'], function () {
        Route::get('/', [KategoriBeritaController::class, 'index'])->name('data-kategori-berita.index');
        Route::post('/store', [KategoriBeritaController::class, 'store'])->name('data-kategori-berita.store');
        Route::get('/edit/{id}', [KategoriBeritaController::class, 'edit'])->name('data-kategori-berita.edit');
        Route::put('/update/{id}', [KategoriBeritaController::class, 'update'])->name('data-kategori-berita.update');
        Route::delete('/destroy/{id}', [KategoriBeritaController::class, 'destroy'])->name('data-kategori-berita.destroy');
    });

    Route::group(['prefix' => 'data-berita'], function () {
        Route::get('/', [BeritaController::class, 'index'])->name('data-berita.index');
        Route::get('/create', [BeritaController::class, 'create'])->name('data-berita.create');
        Route::post('/store', [BeritaController::class, 'store'])->name('data-berita.store');
        Route::get('/show/{id}', [BeritaController::class, 'show'])->name('data-berita.show');
        Route::get('/edit/{id}', [BeritaController::class, 'edit'])->name('data-berita.edit');
        Route::put('/update/{id}', [BeritaController::class, 'update'])->name('data-berita.update');
        Route::delete('/destroy/{id}', [BeritaController::class, 'destroy'])->name('data-berita.destroy');
    });


    Route::group(['prefix' => 'data-level-jabatan'], function () {
        Route::get('/', [LevelJabatanController::class, 'index'])->name('data-level-jabatan.index');
        Route::post('/store', [LevelJabatanController::class, 'store'])->name('data-level-jabatan.store');
        Route::get('/edit/{id}', [LevelJabatanController::class, 'edit'])->name('data-level-jabatan.edit');
        Route::put('/update/{id}', [LevelJabatanController::class, 'update'])->name('data-level-jabatan.update');
        Route::delete('/destroy/{id}', [LevelJabatanController::class, 'destroy'])->name('data-level-jabatan.destroy');
    });
});

// ===== Landings Route ===== //
Route::resource('/', LandingController::class)->only([
    'index'
]);
Route::group(['prefix' => 'berita'], function () {
    // Route::resource('/', LandingBeritaController::class)->only([
    //     'index'
    // ]);
    Route::get('/', [LandingBeritaController::class, 'index'])->name('landings-berita.index');
});

// Route::group(['prefix' => 'landing-page'], function () {
//     Route::get('/', function () {
//         return view('landings-page.index');
//     })->name('landing-page.index');
// });
