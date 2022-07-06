<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Contract\Parser;
use App\Queries\SourceQueryBuilder;
use Illuminate\Pagination\LengthAwarePaginator;
class NewsByOrderController extends Controller
{


    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Parser $parser, SourceQueryBuilder $builder)
    {
        $url = $builder->getSourceUrlByOrderInfo();
        
        $urls = [
            // вставляем данные из таблицы sources
        ];
        
        $news = $parser->setLink($url)->parse();
        // dd(collect($news['news']));
        $newsCollect = collect($news['news']);
        return view('orders.news', ['news'=>$newsCollect, 'category'=> $news['title']]);
    
        
    }
}
