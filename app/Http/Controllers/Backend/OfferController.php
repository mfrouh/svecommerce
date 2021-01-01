<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use App\Models\Product;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offers=Offer::all();
        return view('Backend.offers.index',compact('offers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $product=Product::findorfail($id);
        $offer=Offer::where('product_id',$id)->first();
        if (!$offer) {
            return view('Backend.offers.create',compact('product'));
        }
        else {
            return view('Backend.offers.edit',compact('offer'));
        }
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
            'product_id'=>'required|numeric',
            'type'=>'required|in:fixed,variable',
            'value'=>'required',
            'message'=>'nullable',
            'start_offer'=>'required|before_or_equal:end_offer|after_or_equal:'.now(),
            'end_offer'=>'required|after_or_equal:start_offer'
        ]);
        Offer::create($request->all());
        return back()->with('success','تم انشاء العرض بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function show(Offer $offer)
    {
        return view('Backend.offers.show',compact('offer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function edit(Offer $offer)
    {
        return view('Backend.offers.edit',compact('offer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Offer $offer)
    {
        $this->validate($request,[
            'product_id'=>'required|numeric',
            'type'=>'required|in:fixed,variable',
            'value'=>'required',
            'message'=>'nullable',
            'start_offer'=>'required|before_or_equal:end_offer|after_or_equal:'.now(),
            'end_offer'=>'required|after_or_equal:start_offer'
        ]);
        $offer->update($request->all());
        return back()->with('success','تم تعديل العرض بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Offer $offer)
    {
        $offer->delete();
        return back()->with('success','تم حذف العرض بنجاح');
    }
}
