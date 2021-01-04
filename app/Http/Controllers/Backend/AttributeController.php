<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\Product;
use Illuminate\Http\Request;

class AttributeController extends Controller
{
   public function attribute($id)
   {
     $product=Product::findOrfail($id);
     return view('Backend.product.attribute',compact('product'));
   }
   public function storeattribute(Request $request)
   {
     $product=Product::findOrfail($request->product_id);
     $product->attributes()->updateOrcreate(['name'=>$request->attribute]);
     return response()->json('success');
   }
   public function deleteattribute($id)
   {
     Attribute::findorfail($id)->delete();
     return response()->json('deleted');
   }
}
