<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Faker\Factory;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function getNews()
    {
        $faker = Factory::create();
        $news = [];
        $categories = ['politics','buisness','sport','culture','medcine'];
        for($i=0; $i<count($categories); $i++){
            $arr = [];
            $category[] = $categories[$i];
            for($j=1; $j<11; $j++){
                $arr[] = [
                    'id' => $j,
                    'title' => $faker->text(15),
                    'image' => $faker->imageUrl(),
                    'description' => $faker->text(250),
                    'created_at' => now(),
                    'author' => $faker->lasTName()
                ];
            }
            $news[] = $arr;
        }

        $result = array_combine($category, $news);
        return $result;
    }
}
