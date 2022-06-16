<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Queries\NewsQueryBuilder;
use App\Http\Controllers\Controller;

class IndexNewsController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(NewsQueryBuilder $newsBuilder, int $category_id)
    {
        // потому что не получается выводить новости через ресурс индекс,
        // поскольку через его роут нельзя передавать параметры
        // используется контроллер одого действия с небольшой логикой
        $news = $newsBuilder->getNewsByCategoryId($category_id);
        $category = Category::find($category_id);
        return view('admin.news.index',['news'=>$news,'category' => $category->title]);
    }
}
