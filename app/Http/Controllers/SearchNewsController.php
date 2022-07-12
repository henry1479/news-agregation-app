<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class SearchNewsController extends Controller
{
    public function search(Request $request)
    {
        $validated = $request->except(['token']);
        $searchTerms = $validated['search-terms'];

        $news = News::where('description', 'LIKE', '%'.$searchTerms.'%')->paginate(3);
        return view('news.index', [ 'news' => $news]);
    }
}
