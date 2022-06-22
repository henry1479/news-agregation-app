<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SocialController;
use \App\Http\Controllers\NewsController as NewsController;
use App\Http\Controllers\OrdersController as OrdersController;
use \App\Http\Controllers\CategoryController as CategoryController;
use App\Http\Controllers\FeedbacksController as FeedbacksController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Account\IndexController as AccountController;
use App\Http\Controllers\Admin\IndexController as AdminIndexController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\IndexNewsController as AdminIndexNewsController;
use App\Http\Controllers\Admin\ParserController as AdminParserController;


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
//Девятое задание
// 1. Добавить провайдера для работы с Facebook по аналогии с VK.
// 2. Настроить авторизацию через Facebook по аналогии с VK. Документация:
// https://developers.facebook.com/docs/facebook-login/web.
// 3. Реализовать возможность получения информации из любых открытых сторонних сервисов
// (https://news.yandex.ru, https://www.cbr-xml-daily.ru или другого).
// 4. Реализовать сохранение полученных данных о новостях в БД. При необходимости изменения
// таблиц — создать миграции, изменить формы добавления и редактирования новостей и
// категорий.
// 'github' => [
//     'client_id' => env('GITHUB_CLIENT_ID'),
//     'client_secret' => env('GITHUB_CLIENT_SECRET'),
//     'redirect' => 'http://example.com/callback-url',
// ],
 



Route::get('/', function() {
    $info = 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptatem quos deleniti illum accusamus porro id excepturi, impedit nobis, numquam sapiente a, voluptas quis fuga ullam nesciunt velit at ipsa vero.';
    return view('info', ['info'=> $info]);
});



// роуты новостей
Route::group(['prefix'=>'news'], function () {
    Route::get('/', [CategoryController::class, 'index'])->name('categories');
    Route::get('/{category}', [NewsController::class, 'index']);
    Route::get('/{category}/{news_id}', [NewsController::class, 'show']);

});

// отзывы
Route::get('/feedbacks', [FeedbacksController::class, 'index'])->name('feedbacks.index');
Route::post('/feedbacks/store', [FeedbacksController::class, 'store'])->name('feedbacks.store');

// оформление заказа
Route::group(['name'=>'orders','middleware' => 'admin'], function(){
    Route::resource('/orders', OrdersController::class);
});


// роут сессии
Route::get('/sessions', function(){
    session()->put('test', 'testData');
    dump(session()->get('test'));
    if(session()->has('test')) {
        session()->remove('test');
    }
});


Route::group(['middleware'=>'auth'], function() {
    Route::get('/account', AccountController::class)->name('account');
    // админские роуты
    Route::group(['middleware' => 'admin', 'prefix'=>'admin', 'as'=>'admin.'], function(){
        Route::get('/',AdminIndexController::class)->name('index');
        Route::get('/parser', AdminParserController::class)->name('parser');
        Route::resource('/categories', AdminCategoryController::class);
        Route::resource('/news', AdminNewsController::class);
        Route::resource('/users', AdminUserController::class);
        Route::get('/{category_id}', AdminIndexNewsController::class)->name('news.index');
    });
    
});

Route::group(['middleware'=>'guest'], function (){
	Route::get('/auth/{driver}/redirect', [SocialController::class, 'redirect'])
	->where('driver','\w+')
	->name('social.redirect');
	Route::any('/auth/{driver}/callback', [SocialController::class,'callback'])
	->where('driver','\w+')
	->name('social.callback');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
