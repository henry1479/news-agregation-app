<?php
namespace App\Services;


use App\Services\Contract\Parser;
use Orchestra\Parser\Xml\Facade as XmlParser;

class ParserService implements Parser
{
	protected string $link;


	public function setLink(string $link):Parser
	{
		$this->link = $link;

		return $this;
	}

	public function parse():array
	{
		//парсим яндекс-ленту
		$xml = XmlParser::load($this->link);
		// указываем поля для парсинга
		$news = $xml->parse([
			'title' =>[
				'uses'=> 'channel.title'
			],
			'link' => [
				'uses' => 'channel.link'
			],
			'description' => [
				'uses'=>'channel.description'
			],
			'image' => [
				'uses' => 'channel.image.url'
			],
			'pubDate' => [
				'uses' => 'channel.pubDate'
			],
			
			'news' => [
				'uses' => 'channel.item[title,description,image,pubDate]'
            ]

		]);

        return $news;

	}
}

