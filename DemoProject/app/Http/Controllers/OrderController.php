<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\DeliveryAddress;
use App\OrdersProduct;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$orderDetails = Order::latest()->paginate(10);
    	
        return view('order.index')->with(compact('orderDetails'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) 
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    	$order = Order::where('id',$id)->first();
     	return view('order.edit')->with(compact('order')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    	$data = $request->all();
    	$status = $data['status'];
        Order::find($id)->update(['order_status'=>$status]);
        return redirect()->route('order.index')->with('flash_message_success','Order has bDeliveryAddresseen updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function customerDetails()
    {
        $customerDetails = DeliveryAddress::latest()->paginate(5);
        return view('order.customerPage')->with(compact('customerDetails'));
    }

    public function orderDetails()
    {
        $orderDetails = Order::with('userOrders')->latest()->paginate(5);
        return view('order.orderPage')->with(compact('orderDetails'));
    }

}
