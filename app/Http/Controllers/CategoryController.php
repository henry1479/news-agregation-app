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
    
    private $rules = [
        'title'=> [
            'required',
            'string',
            'min:5',
            'max:250'
        ],
        'description' => [
            'nullable',
            'string'
        ]
    ];
    // выводит категории
    public function index(CategoryQueryBuilder $categories)
    {

        return view('categories.index', ['news'=> $categories->getCategories()]);
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
        $validated = $request->validate($this->rules);
        $category = $category->fill($validated);
       
        if($category->save()){
            return redirect()
            ->route('categories')
            ->with('success','node is added successfully');
        }

        return back()->with('error','Error of editing');


    }

}
