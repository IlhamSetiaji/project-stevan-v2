<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ConditionController;
use App\Http\Controllers\KeteranganController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('/', [AuthController::class, 'postLogin']);
Route::get('/register', [AuthController::class, 'register']);
Route::post('/register', [AuthController::class, 'postRegister']);
Route::middleware('auth')->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/home', [HomeController::class, 'index']);
    Route::prefix('barang')->group(function () {
        Route::get('/', [BarangController::class, 'index']);
        Route::get('/create', [BarangController::class, 'create']);
        Route::post('/create', [BarangController::class, 'store']);
        Route::get('/search-tahun', [BarangController::class, 'searchTahun']);
        Route::post('/search-tahun', [BarangController::class, 'searchTahunResult']);
        Route::get('/search-ruang', [BarangController::class, 'searchRuangan']);
        Route::post('/search-ruang', [BarangController::class, 'searchRuanganResult']);
        Route::get('/{barangID}/update', [BarangController::class, 'showUpdate']);
        Route::post('/{barangID}/update', [BarangController::class, 'updateBarang']);
        Route::get('/{barangID}/delete', [BarangController::class, 'deleteBarang']);
        Route::get('/export', [BarangController::class, 'excel']);
        Route::get('/references', [BarangController::class, 'referensi']);
        Route::get('/recycle-bin', [BarangController::class, 'showTrashed']);
        Route::get('/{barangID}/restore', [BarangController::class, 'restore']);
        Route::get('/{barangID}/force-delete', [BarangController::class, 'deleteForever']);
    });
    Route::prefix('categories')->group(function () {
        Route::get('/', [CategoryController::class, 'index']);
        Route::post('/', [CategoryController::class, 'create']);
        Route::post('/{categoryID}/update', [CategoryController::class, 'update']);
        Route::get('/{categoryID}/delete', [CategoryController::class, 'delete']);
        Route::get('/recycle-bin', [CategoryController::class, 'showTrashed']);
        Route::get('/{categoryID}/restore', [CategoryController::class, 'restore']);
        Route::get('/{categoryID}/force-delete', [CategoryController::class, 'forceDelete']);
    });
    Route::prefix('conditions')->group(function () {
        Route::get('/', [ConditionController::class, 'index']);
        Route::post('/', [ConditionController::class, 'create']);
        Route::post('/{conditionID}/update', [ConditionController::class, 'update']);
        Route::get('/{conditionID}/delete', [ConditionController::class, 'delete']);
        Route::get('/recycle-bin', [ConditionController::class, 'showTrashed']);
        Route::get('/{conditionID}/restore', [ConditionController::class, 'restore']);
        Route::get('/{conditionID}/force-delete', [ConditionController::class, 'forceDelete']);
    });
    Route::prefix('rooms')->group(function () {
        Route::get('/', [RoomController::class, 'index']);
        Route::post('/', [RoomController::class, 'create']);
        Route::post('/{roomID}/update', [RoomController::class, 'update']);
        Route::get('/{roomID}/delete', [RoomController::class, 'delete']);
        Route::get('/recycle-bin', [RoomController::class, 'showTrashed']);
        Route::get('/{roomID}/restore', [RoomController::class, 'restore']);
        Route::get('/{roomID}/force-delete', [RoomController::class, 'forceDelete']);
    });
    Route::prefix('keterangan')->group(function () {
        Route::get('/', [KeteranganController::class, 'index']);
        Route::post('/', [KeteranganController::class, 'create']);
        Route::post('/{keteranganID}/update', [KeteranganController::class, 'update']);
        Route::get('/{keteranganID}/delete', [KeteranganController::class, 'delete']);
        Route::get('/recycle-bin', [KeteranganController::class, 'showTrashed']);
        Route::get('/{keteranganID}/restore', [KeteranganController::class, 'restore']);
        Route::get('/{keteranganID}/force-delete', [KeteranganController::class, 'forceDelete']);
    });
});
