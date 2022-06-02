<?php
declare(strict_type=1);

namespace App\Queries;

use  App\Models\Category;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class CategoryQueryBuilder implements  QueryBuilder
{
    public function getBuilder():Builder
    {
        return Category::query();
    }

    public function getCategories():LengthAwarePaginator
    {
        return Category::select('id','title','description')->paginate(10);
    }


    public function getCategoryById(int $id)
    {
        return Category::select('id','title','description')
            ->findOrFail($id);
    }
}
