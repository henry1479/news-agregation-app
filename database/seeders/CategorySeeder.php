<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory;
use \DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    protected $table = "categories";

    public function run()
    {
        // вставляем данные в таблицу
        DB::table($this->table)->insert($this->getData());
    }

    // гененрируем данные для таблицы
    private function getData():array
    {
        $data=[];
        $faker = Factory::create();
        for($i=0; $i<20; $i++){
            $data[] = [
                'title' => $faker->jobTitle(),
                'description' => $faker->text()
            ];
        }
        return $data;

    }
}
