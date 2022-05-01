<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    { 
        $news = $this->getNews();
        // dump($news);
        return view('news.category', ['news'=> $news]);
    }

}
