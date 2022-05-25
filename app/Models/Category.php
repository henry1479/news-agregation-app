<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \DB;

class Category extends Model
{
    use HasFactory;

    protected $table = "categories";
    // получаем все категории
    public function getCategories()
    {
        // обертка над PDO
        //сейчас не используется
        // return \DB::select("SELECT id, title, description FROM categories");
        // конструктор запросов
        return DB::table($this->table)->select('id','title','description')->get();
    }

    // получаем одну категорию
    public function getCategoryById(int $id)
    {
        // return DB::selectOne("SELECT id, title, description FROM categories WHERE id = :id", [
        //     'id'=>$id
        // ]);
        return DB::table($this->table)
            ->select('id','title','description', 'created_at')
            ->find($id);
    }

    // public function getCategoryWithParams($id)
    // {
    //     return DB::table($this->table)
    //         ->select('id','title','description', 'created_at')
    //         // ->where('id','>', 5)
    //         // ->where('title','like','%'.request()->get('s') .'%')
    //         // -> orWhere('id','=',10);
    //         // сортировка
    //         // orderBy('id', 'desc')
    //         // посчитать записи
    //         // ->count();
    //         // максимальное значение поля
    //         // -> max('id');
    //         // среднее значение
    //         // avg();
    //         // объединение таблиц
    //         // ->join('news', 'categories.id', '=','news.id' )->select('news.*', 'categories.title as category_title');
    //         // посмотреть запрос
    //         // toSql();


    //         ->find($id);
    // }


}
