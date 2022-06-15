<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Category;
use App\Queries\CategoryQueryBuilder;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRequest;
use App\Http\Requests\UpdateRequest;

class CategoryController extends Controller
{
    
 
    // выводит категории
    public function index(CategoryQueryBuilder $categories)
    {

        return view('categories.index', ['news'=> $categories->getCategories()]);
    }
    
    

}
