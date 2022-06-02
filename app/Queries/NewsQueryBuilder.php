<?php

declare(strict_type=1);

namespace App\Queries;

namespace App\Queries;

use  App\Models\News;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class NewsQueryBuilder implements  QueryBuilder
{
    public function getBuilder():Builder
    {
        return News::query();
    }


    public function getNews($category):LengthAwarePaginator
    {
            return News::join('categories','categories.id','=','category_id')
            ->select('news.title', 'news.author','news.description', 'news.id', 'categories.title as category_title')
            ->where('categories.title', '=', $category)
            ->paginate(10);
    }



    
    public function getNewsById($id)
    {
        return News::findOrFail($id);
    }



}
