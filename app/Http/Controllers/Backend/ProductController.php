<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $products=Product::all();
       return view('Backend.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        return view('Backend.product.create',compact('categories'));
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
            'name'=>'required',
            'description'=>'required|min:50',
            'price'=>'required|numeric',
            'status'=>'required|in:active,inactive',
            'sku'=>'required',
            'tags'=>'required'
        ]);
        $product= Product::create($request->all());
        $tags=explode(',',$request->tags);
        $Ttags=array();
        foreach ($tags as $key => $tag) {
            $Ftag=Tag::where('name',$tag)->firstorcreate(['name'=>$tag]);
            $Ftag->id;
            $Ttags[]= $Ftag->id;
        }
        $product->tags()->sync($Ttags);
        return back()->with('success','تم انشاء المنتج بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('Backend.product.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories=Category::all();
        return view('Backend.product.edit',compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $this->validate($request,[
            'name'=>'required',
            'description'=>'required|min:50',
            'price'=>'required|numeric',
            'status'=>'required|in:active,inactive',
            'sku'=>'required',
            'tags'=>'required',
        ]);
        $product->update($request->all());
        $tags=explode(',',$request->tags);
        $Ttags=array();
        foreach ($tags as $key => $tag) {
            $Ftag=Tag::where('name',$tag)->firstorcreate(['name'=>$tag]);
            $Ftag->id;
            $Ttags[]= $Ftag->id;
        }
        $product->tags()->sync($Ttags);
        return back()->with('success','تم تعديل المنتج بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return back()->with('success','تم حذف المنتج بنجاح');
    }
}
