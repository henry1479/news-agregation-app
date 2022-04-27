<?php

use Faker\Provider\Lorem;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/info', function() {
    $info = 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptatem quos deleniti illum accusamus porro id excepturi, impedit nobis, numquam sapiente a, voluptas quis fuga ullam nesciunt velit at ipsa vero.';
    return view('info', ['info'=> $info]);
});


Route::get('/news', function() {
    $news = [
        'news-1'=>'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptatem quos deleniti illum accusamus porro id excepturi, impedit nobis, numquam sapiente a, voluptas quis fuga ullam nesciunt velit at ipsa vero.',
        'news-2'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium repellendus maiores sed non soluta autem, sint similique molestiae quasi corrupti magnam, omnis debitis voluptas? Magni ipsam tempora illo labore corrupti!
        Perspiciatis, voluptatum cumque quidem aperiam possimus ad nobis magni esse minima facere quasi hic blanditiis beatae eveniet officia optio eligendi provident accusantium dignissimos quae aliquam dolorum. Ipsam ea quis exercitationem.'
    ];
    return view('news', ['news'=> $news]);
});