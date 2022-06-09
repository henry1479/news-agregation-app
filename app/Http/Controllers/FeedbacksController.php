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
       $validated = $request->validate($this->rules);
       $feed = Feedback::create($validated);
       if($feed->save()){
           return redirect()
           ->route('feedbacks.index')
           ->with('success','the feedback is added successfully');
       }
       
       return back()->with('error', 'Error adding of the the feedbacks ');
       
   }
}
