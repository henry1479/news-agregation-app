<?php

namespace App\Http\Controllers;

use App\Models\Source;
use Illuminate\Http\Request;
use App\Services\Contract\Parser;

class NewsByOrderController extends Controller
{


    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Parser $parser)
    {
        $source = Source::first();
        dd($source);
        $urls = [
            // вставляем данные из таблицы sources
        ];

        $news = $parser->setLink($source->url)->parse();
        return view('orders.order_news', ['news'=> $news]);
    
        
    }
}
