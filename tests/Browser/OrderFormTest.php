<?php

namespace Tests\Browser;

use Faker\Factory;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class OrderFormTest extends DuskTestCase
{
    use RefreshDatabase;


    /**
     * A basic order form test with correct data.
     *
     * @return void
     */
    public function testCreateOrder()
    {
        $this->browse(function (Browser $browser) {
            $faker = Factory::create();
            $browser->visitRoute('orders.create')
                ->type('user_name', 'sucer')
                ->type('user_email', 'test@email.ru')
                ->type('user_phone', 111-222-3333)
                ->type('order_info', 'test test test test')
                ->press('@send')
                ->assertPathIs('/orders/create');
        });
    }

     /**
     * A basic order form test with incorrect data.
     *
     * @return void
     */
    public function testCreateOrderWithIncorrectData()
    {
        $this->browse(function (Browser $browser) {
            $faker = Factory::create();
            $browser->visitRoute('orders.create')
                ->type('user_name', $faker->userName())
                ->type('user_email', 'test@email.ru')
                ->type('user_phone', 'assddda12')
                ->type('order_info', $faker->text(100))
                ->press('@send')
                ->assertSee('The user phone format is invalid.')
                ->assertPathIs('/orders/create');
        });
    }



}
