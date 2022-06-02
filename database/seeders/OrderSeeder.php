<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory;
use \DB;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    protected $table = "orders";

    public function run()
    {
        DB::table($this->table)->insert($this->getData());
    }

    private function getData():array
    {
        $data=[];
        $faker = Factory::create();
        for($i=0; $i<100; $i++){
            $data[] = [
                'user_name' => $faker->userName(),
                'user_email'=> $faker->email(),
                'user_phone'=> $faker->phoneNumber(),
                'order_info'=> $faker->text()
            ];
        }
        return $data;

    }
}
