<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory;
use \DB;

class FeedbackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    protected $table = "feedbacks";

    public function run()
    {
        DB::table($this->table)->insert($this->getData());
    }

    private function getData():array
    {
        $data=[];
        $faker = Factory::create();
        for($i=0; $i<150; $i++){
            $data[] = [
                'user_name'=> $faker->userName(),
                'feedback_body'=> $faker->text()
            ];
        }
        return $data;

    }
}
