<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\admin\indexController;
use \Illuminate\Support\Facades\Cache;

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



Route::get('startCommand',function (){
    \Illuminate\Support\Facades\Artisan::call('UserControl:start');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/ajax',[\App\Http\Controllers\Ajax\indexController::class,'index'])->name('ajax');
Route::post('/ajax/post',[\App\Http\Controllers\Ajax\indexController::class,'index'])->name('ajax.post');
Route::post('/getData',[App\Http\Controllers\Ajax\indexController::class,'getData'])->name('getData');

Route::group(['namespace'=>'basket','prefix'=>'basket','as','basket.'], function (){
    Route::get('/',[App\Http\Controllers\front\basket\indexController::class,'index'])->name('index');
    Route::get('/add/{id}',[App\Http\Controllers\front\basket\indexController::class,'add'])->name('basket.add');
});

Route::group(['namespace' => 'admin', 'prefix' => 'admin', 'as' => 'admin.','middleware'=>['auth','AdminControl']], function () {
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

Route::get('/1',function (){
    echo '<form action="/post" method="POST" enctype="multipart/form-data">'.csrf_field();
       echo'
        <input type="file" name="photo">
        <button>Post</button>
</form>';
});
Route::post('/post',function (\Illuminate \Http\Request $request){
    $file = $request->file('photo');
    $fileName = "index".rand(1,100).'.'.$file->getClientOriginalExtension();
    $path = $file->storeAs('photos',$fileName);
    dd($path);
});
Route::get('/2',function (){
    echo '<form action="/post" multiple method="POST" enctype="multipart/form-data">'.csrf_field();
       echo'
        <input type="file" name="photo">
        <button>Post</button>
</form>';
});
Route::post('/post2',function (\Illuminate \Http\Request $request){
     $images = $request->file('photos');
     $path = [];

     foreach ($images as $image){
         $name = "index".rand(1,100).'.'.$image->getClientOriginalExtension();
         $file = $image->storeAs('photos',$name);
         $path[] = $file;
     }
     dd($path);
});

Route::post('/control',function (\Illuminate\Http\Request $request){
   $control = \Illuminate\Support\Facades\Storage::disk('local')->exists('photos/index96.jfif');
});
Route::get('/download',function (){
   return \Illuminate\Support\Facades\Storage::download('photos/index96.jfif');
});

Route::get('/cache',function (){
    Cache::put('site_name','library.local',120);
});



