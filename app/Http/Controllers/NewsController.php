<?php
namespace App\Http\Controllers;

use App\Http\Requests\UpdateRequest;
use App\Models\Category;
use App\Models\News;
use App\Queries\NewsQueryBuilder;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRequest;

class NewsController extends Controller
{

    // вывод новостей по категориям
    public function index(NewsQueryBuilder $news, $category)
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

    // вывод формы для добавления новости
    public function create()
    {
        $categories = Category::all();
        return view('news.create', [
            'categories' => $categories
        ]);
    }

    // сохранение новости в базе данных
    public function store(StoreRequest $request)
    {
        
        $validated = $request->except(['_token']);

        $validated['slug'] = \Str::slug($validated['title']);

        $news = News::create($validated);
        $category = Category::find($news->category_id);
        
        if ($news->save()) {
            return redirect('news/' . $category->title . '/' .$news->id)->with('success', 'node is added successfully');
        }

        return back()->with('error', 'Error of adding');
    }

    // вывод формы для редактирования новости
    public function edit(NewsQueryBuilder $news, $news_id)
    {
        $news = $news->getNewsById($news_id);
        $categories = Category::all();
        return view('news.edit', [
            'news' => $news,
            'categories' => $categories
        ]);
    }

    // обновление новости в базе данных
    public function update(News $news, UpdateRequest $request)
    {
        
       $validated =  $request->except(['_token']);
       $news = $news->fill($validated);
       
       $category = Category::find($news->category_id);
       
       if ($news->save()) {
           return redirect('news/' . $category->title . '/' .$news->id)->with('success', 'node is stored successfully');
       }

        return back()->with('error', 'Error of updating');
    }

    // удаление новости из базы данных
    public function destroy($id)
    {
        try {
           $news = News::find($id);
           $news->delete();
           return response()->json([$id => 'the news deleted successfully']);
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return response()->json(['error'=>true], 400);
        }

    }
}
