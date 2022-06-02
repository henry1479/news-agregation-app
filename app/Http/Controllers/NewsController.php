<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Queries\NewsQueryBuilder;
use App\Models\Category;

class NewsController extends Controller
{

    // вывод новостей по категориям
    public function index(NewsQueryBuilder $news, $category)
    {
        return view('news.index', ['news'=>$news->getNews($category)]);
    }

    // вывод конкретной новости
    public function show(NewsQueryBuilder $news, $category, $id)
    {
        return view('news.concrete_news',['news'=>$news->getNewsById($id), 'category'=>$category]);
    }


    // вывод формы для добавления новости
    public function create()
    {
        $categories=Category::all();
        return view('news.create', ['categories'=>$categories]);
    }


    // сохранение новости в базе данных
    public function store(Request $request)
    {
        
        $validated = $request->except(['_token']);

        $validated['slug'] =\Str::slug($validated['title']);

        $news = News::create($validated);

        if($news->save()){
            return redirect()
            ->route('categories')
            ->with('success','node is added successfully');
        }

        return back()->with('error', 'Error of adding');

    }

    public function edit(NewsQueryBuilder $news, $news_id)
    {
        $news = $news->getNewsById($news_id);
        $categories = Category::all();
        return view('news.edit',[
            'news'=>$news,
            'categories'=>$categories
        ]);
    }

    public function update(News $news, Request $request)
    {
        
        $validated = $request->except(['_tocken']);
        $news= $news->fill($validated);
        // dd($news);
        if($news->save()){
            return  redirect()
            ->route('categories')
            ->with('success','node is added successfully');
        }

        return back()->with('error', 'Error of adding');
    }

}
