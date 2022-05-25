<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \DB;

class News extends Model
{
    use HasFactory;


    protected $table = "news";

    // получение списка новостей по названию категории
    public function getNewsByCategoryTitle(?string $category)
    {
        return DB::table($this->table)
            ->join('categories','categories.id','=','news.category_id')
            ->select('news.id', 'news.title','news.author','news.description','categories.title as category_title', 'categories.id as category_table_id')
            ->where('categories.title', '=', $category)
            ->limit(10)
            ->get();
    }

        // получение конкретной новости по идентификатору
    public function  getNewsById(?int $id)
    {
        return DB::table($this->table)
            ->select('news.id', 'news.title', 'news.author', 'news.description')
            ->where('news.id', '=', $id)
            ->get();
    }
}



