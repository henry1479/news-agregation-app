<?php
declare(strict_type = 1);
namespace App\Queries;


use App\Models\News;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;


class NewsQueryBuilder implements QueryBuilder
{

    public function getBuilder(): Builder
    {
        return News::query();
    }

    // получение новостей по названию категории
    public function getNews(string $category): LengthAwarePaginator
    {
        
        return News::join('categories', 'categories.id', '=', 'category_id')->select('news.title', 'news.author', 'news.description', 'news.id', 'news.status', 'categories.title as category_title')
            ->where('categories.title', '=', $category)
            ->paginate(10);
    }

    // получение новостей по идентификатору категориии
    public function getNewsByCategoryId(int $category_id): LengthAwarePaginator
    {
        
        return News::where('category_id','=', $category_id)
            ->paginate(10);
    }

    

    public function getNewsById($id)
    {
        return News::findOrFail($id);
    }
}
