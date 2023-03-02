<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\admin\indexController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['namespace' => 'admin', 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/', [indexController::class, 'index'])->name('index');
    Route::group(['namespace' => 'publisher', 'prefix' => 'publisher', 'as' => 'publisher.'], function () {
        Route::get('/', [\App\Http\Controllers\admin\publisher\indexController::class, 'index'])->name('index');
        Route::get('/add', [\App\Http\Controllers\admin\publisher\indexController::class, 'create'])->name('create');
        Route::post('/add', [\App\Http\Controllers\admin\publisher\indexController::class, 'store'])->name('create.post');
        Route::get('/edit/{id}', [\App\Http\Controllers\admin\publisher\indexController::class, 'edit'])->name('edit');
        Route::post('/edit/{id}', [\App\Http\Controllers\admin\publisher\indexController::class, 'update'])->name('edit.post');
        Route::get('/delete/{id}', [\App\Http\Controllers\admin\publisher\indexController::class, 'delete'])->name('delete');
    });
    Route::group(['namespace' => 'writer', 'prefix' => 'writer', 'as' => 'writer.'], function () {
        Route::get('/', [\App\Http\Controllers\admin\writer\indexController::class, 'index'])->name('index');
        Route::get('/add', [\App\Http\Controllers\admin\writer\indexController::class, 'create'])->name('create');
        Route::post('/add', [\App\Http\Controllers\admin\writer\indexController::class, 'store'])->name('create.post');
        Route::get('/edit/{id}', [\App\Http\Controllers\admin\writer\indexController::class, 'edit'])->name('edit');
        Route::post('/edit/{id}', [\App\Http\Controllers\admin\writer\indexController::class, 'update'])->name('edit.post');
        Route::get('/delete/{id}',[\App\Http\Controllers\admin\writer\indexController::class,'delete'])->name('delete');
    });
    Route::group(['namespace' => 'book', 'prefix' => 'book', 'as' => 'book.'], function () {
        Route::get('/', [\App\Http\Controllers\admin\book\indexController::class, 'index'])->name('index');
        Route::get('/add', [\App\Http\Controllers\admin\book\indexController::class, 'create'])->name('create');
        Route::post('/add', [\App\Http\Controllers\admin\book\indexController::class, 'store'])->name('create.post');
        Route::get('/edit/{id}', [\App\Http\Controllers\admin\book\indexController::class, 'edit'])->name('edit');
        Route::post('/edit/{id}', [\App\Http\Controllers\admin\book\indexController::class, 'update'])->name('edit.post');
        Route::get('/delete/{id}',[\App\Http\Controllers\admin\book\indexController::class,'delete'])->name('delete');
    });
    Route::group(['namespace' => 'category', 'prefix' => 'category', 'as' => 'category.'], function () {
        Route::get('/', [\App\Http\Controllers\admin\category\indexController::class, 'index'])->name('index');
        Route::get('/add', [\App\Http\Controllers\admin\category\indexController::class, 'create'])->name('create');
        Route::post('/add', [\App\Http\Controllers\admin\category\indexController::class, 'store'])->name('create.post');
        Route::get('/edit/{id}', [\App\Http\Controllers\admin\category\indexController::class, 'edit'])->name('edit');
        Route::post('/edit/{id}', [\App\Http\Controllers\admin\category\indexController::class, 'update'])->name('edit.post');
        Route::get('/delete/{id}',[\App\Http\Controllers\admin\category\indexController::class,'delete'])->name('delete');
    });

});

