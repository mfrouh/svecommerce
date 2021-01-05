<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
    public function active(Request $request)
    {
        $this->validate($request,[
            'id'=>"required",
        ]);
        $product=Product::findorfail($request->id);
        $product->update(['status'=>'active']);
        return back()->with('success','تم تفعيل المنتج بنجاح');
    }
    public function inactive(Request $request)
    {
        $this->validate($request,[
            'id'=>"required",
        ]);
        $product=Product::findorfail($request->id);
        $product->update(['status'=>'inactive']);
        return back()->with('success','تم تعطيل المنتج بنجاح');
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
            'tags'=>'required',
            'images'=>'required',
            'image'=>'image|required',
            'video_url'=>'nullable|url',
            'images.*'=>'image',
        ]);
        $product= Product::create($request->all());
        $product->update();
        $tags=explode(',',$request->tags);
        $Ttags=array();
        foreach ($tags as $key => $tag) {
            $Ftag=Tag::where('name',$tag)->firstorcreate(['name'=>$tag]);
            $Ftag->id;
            $Ttags[]= $Ftag->id;
        }
        $product->tags()->sync($Ttags);
        if ($request->images) {
        foreach ($request->images as $key => $image) {
            $product->gallery()->create(['url'=>sortimage("storage/products/p$product->id",$image)]);
        }
        }
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
            'tags'=>'required',
            'image'=>'image|nullable',
            'video_url'=>'nullable|url',
            'images'=>'nullable',
            'images.*'=>'image',
        ]);
        if ($request->image) {
            $path=str_replace('storage/','public/',$product->image);
            Storage::delete($path);
        }
        $product->update($request->all());
        $tags=explode(',',$request->tags);
        $Ttags=array();
        foreach ($tags as $key => $tag) {
            $Ftag=Tag::where('name',$tag)->firstorcreate(['name'=>$tag]);
            $Ftag->id;
            $Ttags[]= $Ftag->id;
        }
        $product->tags()->sync($Ttags);
        if ($request->images) {
        foreach ($request->images as $key => $image) {
            $product->gallery()->create(['url'=>sortimage("storage/products/p$product->id",$image)]);
        }
        }
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
        $product->tags()->delete();
        $product->gallery()->delete();
        $path=str_replace('storage/','public/',$product->image);
        Storage::delete($path);
        Storage::deleteDirectory('public/products/p'.$product->id);
        $product->delete();
        return back()->with('success','تم حذف المنتج بنجاح');
    }
}
