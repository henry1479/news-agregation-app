<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display categories of news and the concrete news 
     * 
     * @param string $category
     * @param integer $id
     * @return void 
     */
    public function index($category, $id=null)
    { 
        $news = $this->getNews();
        $data = $news[$category];
        // dump($data);
        $template = ($id) ? 'news.concrete_news':'news.news';
        if($id) {
            $data = $news[$category][$id-1];
            // dump($data);
        }
        return view($template , ['news'=> $data, 'category' => $category]);
    }

    // public function show($category, $id)
    // {
    //     $newsArray = $this->getNews();
    //     $news = $newsArray[$category][$id];
    //     // dump($news);
    //     return view('concrete_news', ['news'=> $news]);
    // }
}
