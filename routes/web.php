<?php

use Faker\Provider\Lorem;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\CategoryController as CategoryController;
use App\Http\Controllers\FeedbacksController as FeedbacksController;
use \App\Http\Controllers\NewsController as NewsController;
use App\Http\Controllers\OrdersController as OrdersController;


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



Route::get('/', function() {
    $info = 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptatem quos deleniti illum accusamus porro id excepturi, impedit nobis, numquam sapiente a, voluptas quis fuga ullam nesciunt velit at ipsa vero.';
    return view('info', ['info'=> $info]);
});


// роуты новостей
Route::group(['prefix'=>'news'], function () {
    Route::get('/create', [NewsController::class, 'create'])->name('news.create');
    Route::post('/store', [NewsController::class, 'store'])->name('news.store');
    Route::get('/edit/{news_id}', [NewsController::class, 'edit'])->name('news.edit');
    Route::post('/update/{news}', [NewsController::class, 'update'])->name('news.update');

    Route::get('/', [CategoryController::class, 'index'])->name('categories');
    Route::get('/{category}', [NewsController::class, 'index']);
    Route::get('/{category}/{news_id}', [NewsController::class, 'show']);
    Route::delete('/delete/{news_id}', [NewsController::class, 'destroy']);

});
// отзывы
Route::get('/feedbacks', [FeedbacksController::class, 'index'])->name('feedbacks.index');
Route::post('/feedbacks/store', [FeedbacksController::class, 'store'])->name('feedbacks.store');

// оформление заказа
Route::group(['name'=>'orders'], function(){
    Route::resource('/orders', OrdersController::class);
});

// создание и редактировние категорий
Route::group(['prefix'=>'category'], function(){
    Route::get('/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/edit/{category_id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('/update/{category}', [CategoryController::class, 'update'])->name('category.update');
});
