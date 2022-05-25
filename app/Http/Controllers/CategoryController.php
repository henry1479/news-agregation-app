<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    { 
        // получаем модель
        $model= app(Category::class);
        // получаем все категории
        $news = $model->getCategories()->all();
        // dump($news);
        // $news = Category::all();
        // $news = $this->getNews();
        // dump($news);
        return view('news.category', ['news'=> $news]);
    }

}
