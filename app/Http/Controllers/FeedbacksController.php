<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Queries\FeedbackQueryBuilder;
use App\Models\Feedback;

class FeedbacksController extends Controller
{
    
    private $rules = [
        'user_name'=>'required|min:2|max:20',
        'feedback_body'=> 'required|string|min:10'
    ];


    
    public function index(FeedbackQueryBuilder $builder)
    {
        $feeds = $builder->getFeedbacks();
        return view('feedbacks.index', [ 'feeds' => $feeds]);
    }
    /**
     * save the feedbacks from users
     * 
     * @return Response
     */
    
    public function store(Request $request)
    {
    $request->validate($this->rules);
    $validated = $request->except(['_tocken']);
       $feed = Feedback::create($validated);
       if($feed->save()){
           return redirect()
           ->route('feedbacks.index')
           ->with('success',trans('message.feedbacks.store.success'));
       }
       
       return back()->with('error', __('message.feedbacks.store.error'));
       
   }
}
