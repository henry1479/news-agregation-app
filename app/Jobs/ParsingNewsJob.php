<?php

namespace App\Jobs;

use App\Models\Source;
use Illuminate\Bus\Queueable;
use App\Services\Contract\Parser;
use App\Services\ResourceService;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;


class ParsingNewsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $source;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Source $source)
    {
        $this->source = $source;
     
    }
    

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(Parser $parser, ResourceService $service)
    {   
        
        $news = $parser->setLink($this->source->source_url)->parse();
        // добавляем категорию новостей в таблицу, получая ее id
        $category = $service->createCategoryFromParseNews($news['title'], $news['description']);
        // добавляем новости в таблицу, получая истину в качестве результата
        $news = $service->addParseNewsToTable($news['news'],$category, $this->source->id);

    }
}
