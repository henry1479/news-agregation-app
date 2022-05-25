<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory;
use \DB;

class SourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * 
     *
     */

    protected $table = 'sources';

    public function run()
    {
        DB::table($this->table)->insert($this->getData());
    }


    private function getData():array
    {
        $data=[];
        $faker = Factory::create();
        for($i=0; $i<300; $i++){
            $title= $faker->jobTitle();
            $data[] = [
                'news_id'=>rand(1,100),
                'source_name' => $faker->jobTitle(),
                'source_url' => $faker->url()
            ];
        }
        return $data;

    }
}
