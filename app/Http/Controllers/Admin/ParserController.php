<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Contract\Parser;
use Illuminate\Http\Request;

class ParserController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Parser $parser)
    {
        dd($parser->setLink('http://news.yandex.ru/sport.rss')->parse());
        $news = $parser->setLink('url')->parse();
	    return $news;
    }
}
