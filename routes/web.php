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
Route::get('/', [\App\Http\Controllers\front\indexController::class, 'index'])->name('front');
Route::get('/book/detail/{selflink}', [App\Http\Controllers\front\book\indexController::class, 'index'])->name('book.detail');
//Route::get('/register',[\App\Http\Controllers\auth\RegisterController::class,'index'])->name('register');
//Route::post('/register',[\App\Http\Controllers\auth\RegisterController::class,'index'])->name('register.post');
//Route::get('/login',[\App\Http\Controllers\auth\LoginController::class,'index'])->name('login');


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
        Route::get('/delete/{id}', [\App\Http\Controllers\admin\writer\indexController::class, 'delete'])->name('delete');
    });
    Route::group(['namespace' => 'book', 'prefix' => 'book', 'as' => 'book.'], function () {
        Route::get('/', [\App\Http\Controllers\admin\book\indexController::class, 'index'])->name('index');
        Route::get('/add', [\App\Http\Controllers\admin\book\indexController::class, 'create'])->name('create');
        Route::post('/add', [\App\Http\Controllers\admin\book\indexController::class, 'store'])->name('create.post');
        Route::get('/edit/{id}', [\App\Http\Controllers\admin\book\indexController::class, 'edit'])->name('edit');
        Route::post('/edit/{id}', [\App\Http\Controllers\admin\book\indexController::class, 'update'])->name('edit.post');
        Route::get('/delete/{id}', [\App\Http\Controllers\admin\book\indexController::class, 'delete'])->name('delete');
    });
    Route::group(['namespace' => 'category', 'prefix' => 'category', 'as' => 'category.'], function () {
        Route::get('/', [\App\Http\Controllers\admin\category\indexController::class, 'index'])->name('index');
        Route::get('/add', [\App\Http\Controllers\admin\category\indexController::class, 'create'])->name('create');
        Route::post('/add', [\App\Http\Controllers\admin\category\indexController::class, 'store'])->name('create.post');
        Route::get('/edit/{id}', [\App\Http\Controllers\admin\category\indexController::class, 'edit'])->name('edit');
        Route::post('/edit/{id}', [\App\Http\Controllers\admin\category\indexController::class, 'update'])->name('edit.post');
        Route::get('/delete/{id}', [\App\Http\Controllers\admin\category\indexController::class, 'delete'])->name('delete');
    });
    Route::group(['namespace' => 'slider', 'prefix' => 'slider', 'as' => 'slider.'], function () {
        Route::get('/', [\App\Http\Controllers\admin\slider\indexController::class, 'index'])->name('index');
        Route::get('/add', [\App\Http\Controllers\admin\slider\indexController::class, 'create'])->name('create');
        Route::post('/add', [\App\Http\Controllers\admin\slider\indexController::class, 'store'])->name('create.post');
        Route::get('/edit/{id}', [\App\Http\Controllers\admin\slider\indexController::class, 'edit'])->name('edit');
        Route::post('/edit/{id}', [\App\Http\Controllers\admin\slider\indexController::class, 'update'])->name('edit.post');
        Route::get('/delete/{id}', [\App\Http\Controllers\admin\slider\indexController::class, 'delete'])->name('delete');
    });

});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
