<?php

namespace App\Http\Controllers\Admin;



use App\Models\Source;
use App\Jobs\ParsingNewsJob;
use App\Http\Controllers\Controller;


class ParserController extends Controller
{

    
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        $sources = Source::select('id','source_url')->get();
 
        foreach($sources as $source){
            dispatch(new ParsingNewsJob($source));
        }

        return back()->with('success', 'News are parsed!');

        
        
    }
}
