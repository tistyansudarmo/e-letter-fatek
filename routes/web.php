<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistrasiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UsersProdiTiController;
use App\Http\Controllers\UsersProdiPtikController;
use App\Http\Controllers\UsersProdiSipilController;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\SuratProdiController;

use App\Models\Surat;
use App\Models\User;

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


Route::get('/login', [LoginController::class, 'LoginView'])->name('login')->middleware('guest');

Route::post('/login', [LoginController::class, 'authenticate']);

Route::post('/logout', [LoginController::class, 'logout']);

Route::post('/register', [RegistrasiController::class, 'store']);

Route::put('/users-update/{user:id}', [UsersProdiTiController::class, 'update']);

Route::put('/surat/{surat}', [SuratController::class, 'update'])->name('surat.update');

Route::middleware(['auth'])->group(function () {
    Route::get('/', [DashboardController::class, 'count']);
    Route::get('/users-prodi-ti', [UsersProdiTiController::class, 'view']);
    Route::get('/users-prodi-ptik', [UsersProdiPtikController::class, 'view']);
    Route::get('/users-prodi-sipil', [UsersProdiSipilController::class, 'view']);
    Route::get('/surat-prodi-ti', [SuratProdiController::class, 'prodi_ti']);
    Route::get('/surat-prodi-ptik', [SuratProdiController::class, 'prodi_ptik']);
    Route::post('/buat-surat', [SuratController::class, 'store']);
    Route::get('/surat/{surat:no_surat}', [SuratController::class, 'show']);
    Route::delete('/surat/{userId}/{suratId}', [SuratController::class, 'destroy']);
    Route::delete('/users-delete/{id}', [UsersProdiTiController::class, 'destroy']);
    
});

Route::group(['middleware' => ['role:admin|pimpro']], function () {
    Route::get('/register', [RegistrasiController::class, 'RegistrasiView']);
});

Route::group(['middleware' => ['role:pegawai|pimpro']], function () {
    Route::get('/buat-surat', [SuratController::class, 'create']);
    Route::get('/edit-surat/{surat:no_surat}/edit', [SuratController::class, 'edit'])->name('surat.edit');
});

Route::group(['middleware' => ['role:pegawai|pimpro|dosen|dekan|rektor']], function () {
    Route::get('/surat-keluar', [SuratController::class, 'index']);
    Route::get('/surat-masuk', [SuratController::class, 'index2']);
});



