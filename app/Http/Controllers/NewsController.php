<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    /**
     * Display categories of news and the concrete news 
     * 
     * @param string $category
     * @param integer $id
     * @return void 
     */
    public function index($category, $news_id=null)
    { 

        $modelNews = app(News::class);
        $news = $modelNews->getNewsByCategoryTitle($category)->all();
        // dump($news);
        
        $template = 'news.news';
        if($news_id) {
            $news = $modelNews->getNewsById($news_id)->first();
            $template = 'news.concrete_news';
            // dump($news);
        }
        
        return view($template , ['news'=> $news, 'category' => $category]);
    }




    // public function show($category, $id)
    // {
    //     $newsArray = $this->getNews();
    //     $news = $newsArray[$category][$id];
    //     // dump($news);
    //     return view('concrete_news', ['news'=> $news]);
    // }
}
