<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Category;
use App\Queries\CategoryQueryBuilder;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    // выводит категории
    public function index(CategoryQueryBuilder $categories)
    {

        return view('categories.index', ['news'=> $categories->getCategories()]);
    }

    // выводит форму для создания категорий
    public function create()
    {
        return view('categories.create');
    }


    // сохранение в базе данных новой категории
    public function store(Request $request)
    {
        $validated = $request->only(['title','price']);
        $category = Category::create($validated);
        if($category->save())
        {
            return redirect()
                ->route('categories')
                ->with('success','node is added successfully');
        }

        return back()->with('error','Error of adding');


    }


    /**
	 * Show the form for editing the specified resource.
	 *
	 * @param Category $category
	 * 
	 */

    public function edit(int $category_id)
    {
        $categoryInfo = Category::find($category_id);
        return view('categories.edit', ['category_info'=>$categoryInfo]);
    }

 /**
	 * Store editing data from form
	 *
	 * @param Category $category
	 *
	 */


    public function update(Request $request, Category $category)
    {
       
        $validated = $request->only(['title','description']);
        $category = $category->fill($validated);
       
        if($category->save()){
            return redirect()
            ->route('categories')
            ->with('success','node is added successfully');
        }

        return back()->with('error','Error of editing');


    }

}
