<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Coupon;
use App\User;
use Auth;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coupons = Coupon::with('users')->get();
        return view('coupons.index', compact('coupons'))->with('i',(request()->input('page',1) -1) *5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('coupons.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Coupon::create([
            'code' => $request->code,
            'percent_off' => $request->percentoff,
            'no_of_uses' => $request->nouses,
            
        ]);
        return redirect()->route('coupons.index')->with('success','User created successfully');
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $coupon = Coupon::find($id);
        return view('coupons.edit',compact('coupon'));
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
        request()->validate([
            'code' => 'required',
            'percent_off' => 'required',
            'no_of_uses' => 'required'
        ]);
        Coupon::find($id)->update($request->all());
        return redirect()->route('coupons.index')->with('success','Coupon updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Coupon::find($id)->delete();  
        return redirect()->route('coupons.index')->with('success','Coupon deleted successfully');
    }
}
