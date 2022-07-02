<?php
namespace App\Services;

use App\Models\News;
use App\Models\Category;


class  ResourceService 
{
    public function addParseNewsToTable($news, $category, $source) {
        foreach($news as $newsItem){
            $this->changeArrayKey('pubDate','created_at', $newsItem);
            $newsItem =array_merge($newsItem, ['category_id'=>$category,'source_id'=>$source,'author'=>'anonymus']);
            $news = News::firstOrCreate($newsItem);
            $news->save();
        }
        return true;
    }

    public function createCategoryFromParseNews($name, $description){
        $category = Category::firstOrCreate([
            'title'=> $name,
            'description' => $description
        ]);
        if($category->save()){
            return $category->id;
        }
        return false;
    }

    public function changeArrayKey($key,$new_key,&$arr,$rewrite=true){
        if(!array_key_exists($new_key,$arr) || $rewrite){
            $arr[$new_key]=$arr[$key];
            unset($arr[$key]);
            return true;
        }
        return false;
    }
  
}