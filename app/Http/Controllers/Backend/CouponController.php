<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coupons=Coupon::all();
        return view('Backend.coupon.index',compact('coupons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('Backend.coupon.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $this->validate($request,[
           'code'=>'required|unique:coupons',
           'start'=>'required|before_or_equal:end|after_or_equal:'.now(),
           'end'=>'required|after_or_equal:start',
           'cand'=>'nullable|in:more,less else ',
           'cand_value'=>'required_with:cand|nullable|numeric',
           'type'=>'required|in:fixed,variable',
           'value'=>'required',
           'message'=>'nullable',
           'times'=>'required'
       ]);
       Coupon::create($request->all());
       return redirect('/coupon')->with('success','تم انشاء الخصم بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function show(Coupon $coupon)
    {
        return view('Backend.coupon.show',compact('coupon'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function edit(Coupon $coupon)
    {
        return view('Backend.coupon.edit',compact('coupon'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Coupon $coupon)
    {
        $this->validate($request,[
           'code'=>'required|unique:coupons,code,'.$coupon->id,
           'start'=>'required|before_or_equal:end',
           'end'=>'required|after_or_equal:start',
           'cand'=>'nullable|in:more,less else ',
           'cand_value'=>'required_with:cand|nullable|numeric',
           'type'=>'required|in:fixed,variable',
           'value'=>'required',
           'message'=>'nullable',
           'times'=>'required'
        ]);
        $coupon->update($request->all());
        return redirect('/coupon')->with('success','تم تعديل الخصم بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coupon $coupon)
    {
       $coupon->delete();
       return back()->with('success','تم حذف الخصم بنجاح');
    }
}
