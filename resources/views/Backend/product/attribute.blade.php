@extends('layouts.app')
@section('title')
المنتجات
@endsection
@section('css')
@endsection
@section('page-header')
  <!-- breadcrumb -->
  <div class="breadcrumb-header justify-content-between">
	<div class="my-auto">
		<div class="d-flex">
			<h4 class="content-title mb-0 my-auto">الخصائص</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0"></span>
		</div>
	</div>
  </div>
  <!-- breadcrumb -->
@endsection
@section('content')
 <div class="row row-sm">
    <div class="col-xl-4">
       <div class="card mg-b-20">
           <div class="card-body text-center">
               <input type="text" class="form-control" id="attribute" placeholder="اضافة خصائص">
               <input type="hidden" class="form-control" id="product_id" value="{{$product->id}}" >
               <a href="javascript:void(0)" id="addattribute" class="btn btn-pink btn-sm p-2 m-2">اضافة</a>
               <table class="table">
                <thead>
                    <th>الخصائص</th>
                    <th>الصلاحيات</th>
                </thead>
                <tbody>
                    @foreach ($product->attributes as $attribute)
                    <tr>
                       <td>{{$attribute->name}}</td>
                       <td><a href="javascript:void(0)" data-id="{{$attribute->id}}" class="deleteattribute btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                    </tr>
                    @endforeach
                </tbody>
             </table>
           </div>
       </div>
    </div>
    </div>
    <h4 class="content-title mb-0 my-auto">القيم</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0"></span>
    <div class="row row-sm">
     @foreach ($product->attributes as $attribute)
     <div class="col-xl-4">
        <div class="card mg-b-20">
            <div class="card-header">{{$attribute->name}}</div>
            <div class="card-body text-center">
                <input type="text" class="form-control value" placeholder="اضافة قيمة">
                <input type="hidden" class="form-control attribute_id" value="{{$attribute->id}}" >
                <a href="javascript:void(0)" class="addvalue btn btn-pink btn-sm p-2 m-2">اضافة</a>
                <table class="table">
                    <thead>
                        <th>القيم</th>
                        <th>الصلاحيات</th>
                    </thead>
                    <tbody>
                        @foreach ($attribute->values as $value)
                        <tr>
                           <td>{{$value->value}}</td>
                           <td><a href="javascript:void(0)" data-id="{{$value->id}}" class="deletevalue btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                        </tr>
                        @endforeach
                    </tbody>
                 </table>
            </div>
        </div>
     </div>
     @endforeach
    </div>
    <h4 class="content-title mb-0 my-auto">varaint</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0"></span>
    <div class="row row-sm">
      <div class="col-xl-12">
        <div class="card mg-b-20">
          <div class="card-body text-center">
        <table class="table">
            <thead>
                @foreach ($product->attributes->sortBy('id') as $attribute)
                 <th>{{$attribute->name}}</th>
                @endforeach
                <th>السعر</th>
                <th> السعر بعد العرض</th>
                <th>الكمية</th>
                <th>الصلاحيات</th>
            </thead>
            <tbody>
                <tr>
                    <form action="" id="form">
                    @foreach ($product->attributes->sortBy('id') as $attribute)
                     <td>
                       <select  id="{{$attribute->id}}" name="{{$attribute->id}}" class="form-control">
                          @foreach ($attribute->values as $value)
                           <option value="{{$value->id}}">{{$value->value}}</option>
                          @endforeach
                       </select>
                     </td>
                    @endforeach
                    <td><input type="text" class="form-control" name="price" id="price"></td>
                    <td></td>
                    <td><input type="number" class="form-control" name="quantity" id="quantity"></td>
                    <input type="hidden" class="form-control" name="product_id" id="product_id" value="{{$product->id}}" >
                    <td> <a href="javascript:void(0)" class="addvariant btn btn-pink btn-sm p-2 m-2">اضافة</a></td>
                   </form>
                 </tr>
                @foreach ($product->variants as $variant)
                <tr>
                   @foreach ($variant->values->sortBy('attribute_id') as $value)
                    <td>{{$value->value}}</td>
                   @endforeach
                   <td>{{$variant->price}} جنية</td>
                   <td>{{$variant->priceafteroffer}} جنية</td>
                   <td>{{$variant->quantity}}</td>
                   <td><a href="javascript:void(0)" data-id="{{$variant->id}}" class="deletevariant btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                </tr>
                @endforeach
            </tbody>
         </table>
        </div>
        </div>
      </div>
    </div>
 </div>
@endsection
@section('js')
<script>
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
     $('#addattribute').click(function()
     {
        var product_id=$('#product_id').val();
        var attribute=$('#attribute').val();
        $.ajax({
            type: "post",
            url: "/attribute",
            data: {product_id:product_id,attribute:attribute},
            dataType: "json",
            success: function (response) {
                $('#attribute').val('');
                location.reload();
            }
        });
     });
     $('.deleteattribute').click(function()
     {
        var id=$(this).attr("data-id");
        $.ajax({
            type: "delete",
            url: "/attribute/"+id,
            dataType: "json",
            success: function (response) {
                location.reload();
            }
        });
     });
     $('.addvalue').click(function()
     {
        var attribute_id=$(this).prev('.attribute_id').val();
        var value=$(this).prev().prev('.value').val();
        $.ajax({
            type: "post",
            url: "/value",
            data: {attribute_id:attribute_id,value:value},
            dataType: "json",
            success: function (response) {
                $('.value').val('');
                location.reload();
            }
        });
     });
     $('.addvariant').click(function()
     {
        $.ajax({
            type: "post",
            url: "/variant",
            data:$('#form').serialize(),
            dataType: "json",
            success: function (response) {
                $('.value').val('');
                location.reload();
            }
        });
     });
     $('.deletevalue').click(function()
     {
        var id=$(this).attr("data-id");
        $.ajax({
            type: "delete",
            url: "/value/"+id,
            dataType: "json",
            success: function (response) {
                location.reload();
            }
        });
     });
     $('.deletevariant').click(function()
     {
        var id=$(this).attr("data-id");
        $.ajax({
            type: "delete",
            url: "/variant/"+id,
            dataType: "json",
            success: function (response) {
                location.reload();
            }
        });
     });
</script>
@endsection
