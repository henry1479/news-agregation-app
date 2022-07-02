<?php

namespace App\Http\Controllers\Admin;


use App\Services\Contract\Parser;
use App\Services\ResourceService;
use App\Queries\SourceQueryBuilder;
use App\Http\Controllers\Controller;



class ParserController extends Controller
{

    // подкулючаем сервис, минуя провайдер
    public function __construct(ResourceService $service)
    {
        $this->service = $service;
    }
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Parser $parser, SourceQueryBuilder $sourceBuilder)
    {
        // получаем строку из таблицы sources
        $source = $sourceBuilder->getSource('sport news');
        // парсим новости
        $news = $parser->setLink($source->source_url)->parse();
        // добавляем категорию новостей в таблицу, получая ее id
        $category = $this->service->createCategoryFromParseNews($news['title'], $news['description']);
        // добавляем новости в таблицу, получая истину в качестве результата
        $news = $this->service->addParseNewsToTable($news['news'],$category, $source->id);
        // если все добавилось, тогда выводим сообщения об итогах добавления
        if($category && $news){
            return back()->with('success', 'Data is refresh successfully!');
        }

        return back()->with('error', 'Refreshing error is occured');
        
    }
}
