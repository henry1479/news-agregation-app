<?php

namespace Tests\Feature\App;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AppTest extends TestCase
{
   
    // тест на создание страницы приветсвия приложения
    public function testWelcomePageRender()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    // тест на проверку передачи параметра текста приветсвия в представление
    public function testWelcomeTextPassed()
    {
        $view = $this->view('info', ['info'=>'Some text']);
        $view->assertSee('Some text');
        
    }

    // тест на отрисовку текста в представлении
    public function testWelcomeTextRendered()
    {
        $response = $this->get('/');
        $response->assertSee('Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptatem quos deleniti illum accusamus porro id excepturi, impedit nobis, numquam sapiente a, voluptas quis fuga ullam nesciunt velit at ipsa vero.');
    }

}
