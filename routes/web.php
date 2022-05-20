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


// роуты новостей и категорий новостей
Route::group(['prefix'=>'news'], function () {
    Route::get('/', [CategoryController::class, 'index'])->name('categories');
    Route::get('/{category}', [NewsController::class, 'index']);
    Route::get('/{category}/{id}', [NewsController::class, 'index']);
});
// отзывы
Route::get('/feedbacks', [FeedbacksController::class, 'index'])->name('feedbacks');
Route::post('/feedbacks/store', [FeedbacksController::class, 'store'])->name('feedbacks.store');

// оформление заказа
Route::group(['name'=>'orders'], function(){
    Route::resource('/orders', OrdersController::class);
});

