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

Route::get('/', [DashboardController::class, 'count'])->middleware('auth');

Route::get('/login', [LoginController::class, 'LoginView'])->name('login')->middleware('guest');

Route::post('/login', [LoginController::class, 'authenticate']);

Route::post('/logout', [LoginController::class, 'logout']);

Route::post('/register', [RegistrasiController::class, 'store']);

Route::get('/users-prodi-ti', [UsersProdiTiController::class, 'view'])->middleware('auth');

Route::get('/users-prodi-ptik', [UsersProdiPtikController::class, 'view'])->middleware('auth');

Route::get('/users-prodi-sipil', [UsersProdiSipilController::class, 'view'])->middleware('auth');

Route::get('/surat-prodi-ti', [SuratProdiController::class, 'prodi_ti'])->middleware('auth');

Route::post('/buat-surat', [SuratController::class, 'store'])->middleware('auth');

Route::get('/surat/{surat:no_surat}', [SuratController::class, 'show'])->middleware('auth');

Route::delete('/surat/{userId}/{suratId}', [SuratController::class, 'destroy'])->middleware('auth');

Route::delete('/users-delete/{id}', [UsersProdiTiController::class, 'destroy'])->middleware('auth');

Route::put('/users-update/{user:id}', [UsersProdiTiController::class, 'update']);

Route::put('/surat/{surat}', [SuratController::class, 'update'])->name('surat.update');


Route::group(['middleware' => ['role:admin|pimpro']], function () {
    Route::get('/register', [RegistrasiController::class, 'RegistrasiView']);
});

Route::group(['middleware' => ['role:pegawai']], function () {
    Route::get('/surat-keluar', [SuratController::class, 'index']);
    Route::get('/surat-masuk', [SuratController::class, 'index2']);
    Route::get('/buat-surat', [SuratController::class, 'create']);
    Route::get('/edit-surat/{surat:no_surat}/edit', [SuratController::class, 'edit'])->name('surat.edit');
});



