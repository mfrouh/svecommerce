<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $categories=Category::all();
        return view('Backend.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Backend.category.create');
    }
    public function active(Request $request)
    {
        $this->validate($request,[
            'id'=>"required",
        ]);
        $category=Category::findorfail($request->id);
        $category->update(['status'=>'active']);
        return back()->with('success','تم تفعيل القسم بنجاح');
    }
    public function inactive(Request $request)
    {
        $this->validate($request,[
            'id'=>"required",
        ]);
        $category=Category::findorfail($request->id);
        $category->update(['status'=>'inactive']);
        return back()->with('success','تم تعطيل القسم بنجاح');
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
            'name'=>"required|unique:categories",
            'status'=>'nullable|in:active,inactive',
            'image'=>'image|nullable',
        ]);
        $image=null;
        if ($request->image) { $image=sortimage('storage/categories',$request->image);}
        Category::create(['name'=>$request->name,'status'=>$request->status,'image'=>$image]);
        return back()->with('success','تم انشاء القسم بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        $products=Product::where('category_id',$category->id)->get();
        return view('Backend.category.show',compact('category','products'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('Backend.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $this->validate($request,[
            'name'=>"required|unique:categories,name,".$category->id,
            'status'=>'nullable|in:active,inactive',
            'image'=>'image|nullable',
        ]);
        $image=$category->image;
        if ($request->image) {
            $path=str_replace('storage/','public/',$category->image);
            Storage::delete($path);
            $image=sortimage('storage/categories',$request->image);
        }
        $category->update(['name'=>$request->name,'status'=>$request->status,'image'=>$image]);
        return back()->with('success','تم تعديل القسم بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $path=str_replace('storage/','public/',$category->image);
        Storage::delete($path);
        $category->delete();
        return back()->with('success','تم حذف القسم بنجاح');
    }
}
