<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::select('id','name')->get();
        return view('admin.users.index', ['users'=>$users]);
    }

    /**
   

    
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.users.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user )
    {
        // $request->validate($this->rules);
        $validated = $request->except(['_token','_method']);
        // dd($validated);
        $user = $user->fill($validated);
        
        if($user->save()){
            return redirect()
            ->route('admin.users.index')
            ->with('success','user is edited successfully');
        }
        
        return back()->with('error','Error of editing');
    }

    
}
