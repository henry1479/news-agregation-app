<?php
namespace App\Http\Controllers;

use App\Queries\NewsQueryBuilder;


class NewsController extends Controller
{

    // вывод новостей по категориям
    public function index(NewsQueryBuilder $news, string $category)
    {
       
        return view('news.index', [
            'news' => $news->getNews($category)
        ]);
    }

    // вывод конкретной новости
    public function show(NewsQueryBuilder $news, $category, $id)
    {
        return view('news.concrete_news', [
            'news' => $news->getNewsById($id),
            'category' => $category
        ]);
    }


}
