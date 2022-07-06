<?php
declare(strict_type=1);

namespace App\Queries;

use App\Models\News;
use  App\Models\Category;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Contracts\Database\Eloquent\Builder;

class CategoryQueryBuilder implements  QueryBuilder
{
    public function getBuilder():Builder
    {
        return Category::query();
    }

    public function getCategories():LengthAwarePaginator
    {
        return Category::select('id','title','description')->paginate(5);
    }


    public function getCategoryById(int $id)
    {
        return Category::select('id','title','description')
            ->findOrFail($id);
    }

    public function addCategory($name,$description){
        $category = Category::firstOrCreate([
            'title'=> $name,
            'description' => $description
        ]);
        if($category->save()){
            return $category->id;
        }
        return false;
    }

    public function hasNoNews()
    {
        
        return News::rightJoin('categories','news.category_id','=', 'categories.id')
        ->select('categories.id', 'categories.title', 'categories.description')
        ->distinct()
        ->whereNotNull('news.id')
        ->simplePaginate(5);
    }
            
    
    

}
