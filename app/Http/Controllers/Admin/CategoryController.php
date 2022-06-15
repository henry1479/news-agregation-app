<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Queries\CategoryQueryBuilder;
use Illuminate\Http\Request;

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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CategoryQueryBuilder $category)
    {
        
        return view('admin.categories.index', ['news'=>$category->getCategories()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate($this->rules);
        $validated = $request->except(['_token']);
        $category = Category::create($validated);
        if($category->save())
        {
            return redirect()
                ->route('admin.categories.index')
                ->with('success','node is added successfully');
        }

        return back()->with('error','Error of adding');

    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view("admin.categories.edit", ["category_info" => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate($this->rules);
        $validated = $request->except(['_token']);
        $category = $category->fill($validated);
        
        if($category->save()){
            return redirect()
            ->route('admin.categories.index')
            ->with('success','node is added successfully');
        }
        
        return back()->with('error','Error of editing');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        
    }
}
