<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class FeedbackFormTest extends DuskTestCase
{
    use RefreshDatabase;
    /**
     * тест на правильность валидации формы отзывов
     * с корректными данными
     *
     * @return void
     */


    public function testWithTrueFeedbackData()
    {
        
        $this->browse(function (Browser $browser) {
            $browser->visit('/news')
                ->type('@feedback_username', 'JOHN')
                ->type('@feedback_body', 'test test test')
                ->press('@send_feedback')
                ->assertPathIs('/feedbacks')
                ->assertSee('the feedback is added successfully');
        });
    }

    /**
     * тест на правильность валидации формы отзывов
     * с некорректными данными
     *
     * @return void
     */

    public function testWithFalseFeedbackData() {
        $this->browse(function (Browser $browser){
            $browser->visit('/news')
                ->type('@feedback_username', '')
                ->type('@feedback_body', 'test test test')
                ->press('@send_feedback')
                ->assertPathIs('/news')
                ->assertSee('The user name field is required.');
        });
    }
}
