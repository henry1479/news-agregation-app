<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Queries\OrderQueryBuilder;

class OrdersController extends Controller
{
    private $rules = [
        'user_name'=>'required|min:2|max:20',
        'user_email'=>'required|email',
        'user_phone'=> 'sometimes',
        'order_info'=> 'required|string|min:10'
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(OrderQueryBuilder $builder, Order $orders)
    {
        $orders = $builder->getOrders();
        return view('orders.index',['orders'=>$orders]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('orders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate($this->rules);
        $order = Order::create($validated);
        if($order->save()){
            return redirect()
            ->route('orders.index')
            ->with('success','the node is added successfully');
        }
        
        return back()->with('error', 'Error of adding');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Order $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
//         dd($order);
        return view('orders.edit', ['order'=>$order]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Order $order
     * @return \Illuminate\Http\Response
     */
    public function update(Order $order, Request $request)
    {
//         dump($request->except(['_token']));
        $validated = $request->validate($this->rules);
        $order = $order->fill($validated);
//         dd($order);
        if($order->save()){
            return  redirect()
            ->route('orders.index')
            ->with('success','the changes is added successfully');
        }
        
        return back()->with('error', 'Error of adding');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}
