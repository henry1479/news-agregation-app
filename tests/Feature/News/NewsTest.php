<?php
namespace Tests\Feature\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Http\Controllers\Controller;
use Tests\TestCase;


class NewsTest extends TestCase
{
    
    // тест на создание страницы с категориями
    public function testCheckNewsIndex()
    {
        $response = $this->get('news/medcine');
        $response->assertStatus(200);
    }

    // тест на вывод имени автора на страничке конкретной новости
    public function testAuthorNewsBeRendered()

    {
        $news = (new Controller)->getNews();
        $view = $this->view('news.concrete_news', ['news'=>$news['politics'][4],'category'=>'politics']);
        $view->assertSee($news['politics'][4]['author']);
    }

    // тест на на возвращение роутом правильного шаблона
    public function testRouteReturnRightView()
    {
        $response = $this->get('news/politics');
        $response->assertViewIs('news.news');
    }

    // тест на проверку передачи в представление категорий 
    // переменной с новостями
    public function testParamViewPassed()
    {
        $response = $this->get(route('categories'));
        $response->dump();
        $response->assertViewHas('news');
    }

}