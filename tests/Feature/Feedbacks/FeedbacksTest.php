<?php

namespace Tests\Feature\Feedbacks;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FeedbacksTest extends TestCase
{
    // тест на создание страницы с отзывами
    public function testCreateFeedback()
    {
        $response = $this->get(route('feedbacks'));
        $response->assertStatus(200);
    }
    //  тест на json в ответе
    public function testCheckFeedbacksStore()
    {
        $data = [
            'user_name'=> 'Name',
            'feedback_body' => 'Body'
        ];
        $response= $this->json('post', route('feedbacks.store'), $data);
        $response->assertJson($data);
        $response->assertStatus(201);
    }

}
