<?php

namespace App\Http\Controllers\Admin;

use App\Models\News;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Queries\NewsQueryBuilder;
use App\Http\Requests\News\StoreRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\News\UpdateRequest;
use App\Services\Contract\Upload;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(NewsQueryBuilder $news )
    {
        // realization
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $categories = Category::select('title','id')->get();
        return view('admin.news.create', [
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request, Upload $uploadService)
    {
        $validated = $request->except(['_token']);
        $validated['slug'] = \Str::slug($validated['title']);
        if($request->hasFile('image')){
            $validated['image'] = $uploadService->uploadImage($request->file('image'));
        }
        // dd($validated);
        $news = News::create($validated);
        
        if ($news->save()) {
            return redirect('admin/'. $news->category_id)->with('success', 'node is added successfully');
        }

        return back()->with('error', 'Error of adding');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
          
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        $categories = Category::select('id','title')->get();
        
        return view('admin.news.edit', [
            'news' => $news,
            'categories' => $categories
        ]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, News $news, Upload $uploadService)
    {
        $validated =  $request->except(['_token']);
        if($request->hasFile('image')){
            $validated['image'] = $uploadService->uploadImage($request->file('image'));
        }

        // dd($validated);
        $news = $news->fill($validated);
        
        if($news->save()) {
            return redirect('admin/'. $request->input('category_id'))->with('success', 'node is stored successfully');
        }
 
         return back()->with('error', 'Error of updating');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        try {
            $news->delete();
            return response()->json([$news->id => 'the news deleted successfully']);
         } catch (\Exception $e) {
             \Log::error($e->getMessage());
             return response()->json(['error'=>true], 400);
         }
    }
}
