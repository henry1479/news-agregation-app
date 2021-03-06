<?php


use Illuminate\Support\Facades\Auth;
use UniSharp\LaravelFilemanager\Lfm;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\NewsByOrderController;
use \App\Http\Controllers\NewsController as NewsController;
use App\Http\Controllers\OrdersController as OrdersController;
use \App\Http\Controllers\CategoryController as CategoryController;
use App\Http\Controllers\FeedbacksController as FeedbacksController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Account\IndexController as AccountController;
use App\Http\Controllers\Admin\IndexController as AdminIndexController;
use App\Http\Controllers\Admin\ParserController as AdminParserController;
use App\Http\Controllers\Admin\SourceController as AdminSourceController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\IndexNewsController as AdminIndexNewsController;
use App\Http\Controllers\SearchNewsController;


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

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    Lfm::routes();
});



// роуты новостей
Route::group(['prefix'=>'news'], function () {
    
    Route::get('/', [CategoryController::class, 'index'])->name('categories');
    Route::get('/search', [SearchNewsController::class, 'search'])->name('search');
    Route::get('/{category}', [NewsController::class, 'index']);
    Route::get('/{category}/{news_id}', [NewsController::class, 'show']);


});

// отзывы
Route::get('/feedbacks', [FeedbacksController::class, 'index'])->name('feedbacks.index');
Route::post('/feedbacks/store', [FeedbacksController::class, 'store'])->name('feedbacks.store');

// оформление заказа
Route::group(['as'=>'orders.', 'prefix'=>'orders','middleware' => 'admin'], function(){
    Route::resource('/', OrdersController::class);
    Route::get('/news', NewsByOrderController::class)->name('news');
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
        Route::resource('/sources', AdminSourceController::class);
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
