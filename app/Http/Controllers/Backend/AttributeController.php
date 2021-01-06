<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\Product;
use App\Models\Value;
use App\Models\Variant;
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
    $this->validate($request,
    [
      'name' => 'required|unique:attributes,name,NULL,id,product_id,'.$request->product_id,
      'product_id'=>'required|numeric',
    ]) ;
     $product=Product::findOrfail($request->product_id);
     $product->attributes()->updateOrcreate(['name'=>$request->name]);
     return response()->json('success');
   }
   public function deleteattribute($id)
   {
     Attribute::findorfail($id)->delete();
     return response()->json('deleted');
   }
   public function storevalue(Request $request)
   {
    $this->validate($request,
    [
      'value' => 'required|unique:values,value,NULL,id,attribute_id,'.$request->attribute_id,
      'attribute_id'=>'required|numeric',
    ]) ;
     $attribute=Attribute::findOrfail($request->attribute_id);
     $attribute->values()->updateOrcreate(['value'=>$request->value]);
     return response()->json('success');
   }
   public function storevariant(Request $request)
   {
      $this->validate($request,
      [
        'price'=>'required|numeric',
        'quantity'=>'required|numeric',
      ]) ;
     $product=Product::findOrfail($request->product_id);
     $vari='';
     foreach ($request->except(['price','product_id','quantity']) as $key => $value) {
        $vari.='_'.$value;
        $values[]=$value;
     }
     if ($product->attributes->count() == count($values)) {
        $sku='p'.$product->id.$vari;
        $isvari=Variant::where('sku',$sku)->first();
        if (!$isvari) {
        $variant= Variant::create(["product_id"=>$request->product_id,"sku"=>$sku,'price'=>$request->price,'quantity'=>$request->quantity]);
        $variant->values()->sync($values);
        return response()->json('success');
        }
        return response()->json('found');
     }
     return response()->json('error');
   }
   public function deletevalue($id)
   {

     Value::findorfail($id)->variants()->delete();
     Value::findorfail($id)->delete();
     return response()->json('deleted');
   }
   public function deletevariant($id)
   {
     Variant::findorfail($id)->delete();
     return response()->json('deleted');
   }
}
