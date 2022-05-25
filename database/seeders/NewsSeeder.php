<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory;
use \Str;
use \DB;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    protected $table = "news";
    
    public function run()
    {
        DB::table($this->table)->insert($this->getData());
    }

    private function getData():array
    {
        $data=[];
        $faker = Factory::create();
        for($i=0; $i<200; $i++){
            $title= $faker->jobTitle();
            $data[] = [
                'category_id'=>rand(1,20),
                'title' => $title,
                'slug'=> Str::slug($title),
                'author'=>$faker->userName(),
                'description' => $faker->text()
            ];
        }
        return $data;

    }
}
