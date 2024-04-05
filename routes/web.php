<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TempImageController;
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

Route::get('/', [HomeController::class, 'index'])->name('dashboard');

Route::group(['prefix' => 'album', 'as' => 'album.'], function () {
    Route::get('/', [AlbumController::class, 'index'])->name('index');
    Route::get('/create', [AlbumController::class, 'create'])->name('create');
    Route::get('/{album}', [AlbumController::class, 'show'])->name('show');
    Route::get('/add/pic/{album}', [AlbumController::class, 'addPic'])->name('add_pic');
    Route::post('store', [AlbumController::class, 'store'])->name('store');
    Route::post('edit/{Album}', [AlbumController::class, 'edit'])->name('edit');
});


Route::post('upload_temp', [TempImageController::class, 'store'])->name('store_temp');
Route::get('delete_temp', [TempImageController::class, 'destroy'])->name('delete_temp');
