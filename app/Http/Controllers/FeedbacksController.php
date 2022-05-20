<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FeedbacksController extends Controller
{


    public function setData($data){
        $this->data[] = $data;
    }

    public function index($state=false, $data = [])
    {
        dump($state);
        return view('feedbacks.index', ['success' => $state, 'data' => $data]);
    }
    /**
     * save the feedbacks from users
     * 
     * @return Response
     */
    
    public function store(Request $request)
   {
        // получаем данные из формы кроме поля _token
        $data = $request->except('_token');
        // для тестирования json
        // return response()->json($data,201);
        // переходим на ту же страницу с сообщением об успехе
        return $this->index(true, $data);
    }
}
