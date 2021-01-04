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
               <a href="#" id="addattribute" class="btn btn-pink btn-sm p-2 m-2">اضافة</a>
           </div>
       </div>
    </div>
    <div class="col-xl-8">
        <div class="card mg-b-20">
            <div class="card-body text-center">
                <table class="table">
                   <thead>
                       <th>#</th>
                       <th>المنتج</th>
                       <th>الخصائص</th>
                       <th>الصلاحيات</th>
                   </thead>
                   <tbody>
                       @foreach ($product->attributes as $attribute)
                       <tr>
                          <td>{{$attribute->id}}</td>
                          <td>{{$attribute->product->name}}</td>
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

            }
        });
     });
</script>
@endsection
