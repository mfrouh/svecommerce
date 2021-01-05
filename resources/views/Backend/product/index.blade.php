@extends('layouts.app')
@section('title')
المنتجات
@endsection
@section('css')
<!-- Internal Data table css -->
<link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
  <!-- breadcrumb -->
  <div class="breadcrumb-header justify-content-between">
	<div class="my-auto">
		<div class="d-flex">
			<h4 class="content-title mb-0 my-auto">المنتجات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0"></span>
		</div>
	</div>
  </div>
  <!-- breadcrumb -->
@endsection
@section('content')
				<!-- row opened -->
 <div class="row row-sm">
 	<div class="col-xl-12">
 		<div class="card mg-b-20">
 			<div class="card-header pb-0">
 				<div class="d-flex justify-content-between">
 					<h4 class="card-title mg-b-0">المنتجات</h4>
 				</div>
 			</div>
 			<div class="card-body">
 				<div class="table-responsive">
 					<table id="example1" class="table key-buttons text-md-nowrap text-center">
 						<thead>
 							<tr>
 								<th class="border-bottom-0">الاسم</th>
 								<th class="border-bottom-0">الصورة</th>
                                <th class="border-bottom-0">الحالة</th>
                                <th class="border-bottom-0">السعر</th>
                                <th class="border-bottom-0">السعربعدالعرض</th>
                                <th class="border-bottom-0">القسم</th>
                                <th class="border-bottom-0">sku</th>
 								<th class="border-bottom-0">الصلاحيات</th>
 							</tr>
 						</thead>
 						<tbody>
						 @foreach ($products as $product)
 							<tr>
 				<td>{{$product->name}}</td>
                <td>
                     @if ($product->image)
                       <img src="{{asset($product->image)}}" width="50px" height="50px" alt="">
                     @else
                       <img src="{{asset('storage/categories/1.png')}}" width="50px" height="50px" alt="">
                     @endif
                </td>
                <td>{{$product->getstatus()}}</td>
                @if ($product->variants->count() > 0)
                <td>{{$product->variantprice}} جنية</td>
                <td>{{$product->variantpriceafteroffer}} جنية</td>
                @else
                <td>{{$product->price}} جنية</td>
                <td>{{$product->priceafteroffer}} جنية</td>
                @endif
                <td>{{$product->category->name}}</td>
                <td>{{$product->sku}}</td>
 			   <td>
                    @if ($product->attributes->count()>0)
                    <a class="btn btn-warning btn-sm" href="/product/{{$product->id}}/attribute">( {{$product->variants->count()}} )تعديل الخصائص</a>
                    @else
                    <a class="btn btn-info btn-sm" href="/product/{{$product->id}}/attribute"> اضافة الخصائص</a>
                    @endif
                    @if ($product->offer)
                    <a class="btn btn-warning btn-sm" href="/offer/{{$product->offer->id}}/edit">تعديل عرض</a>
                    @else
                    <a class="btn btn-info btn-sm" href="/offer/create/{{$product->id}}">اضافة عرض</a>
                    @endif
                     {{--  @can('مشاهدة منتج')  --}}
                     <a class="btn btn-success btn-sm" href="/product/{{$product->id}}"><i class="fa fa-eye" aria-hidden="true"></i></a>
                     {{--  @endcan  --}}
                     {{--  @can('تعديل منتج')  --}}
                     <a class="btn btn-primary btn-sm" href="/product/{{$product->id}}/edit"><i class="fa fa-edit" aria-hidden="true"></i></a>
                     {{--  @endcan  --}}
                     {{--  @can('حذف منتج')  --}}
                     <a class="btn btn-danger btn-sm"  href="/product/{{$product->id}}"
                        onclick="event.preventDefault();
                        document.getElementById('delete-product-{{$product->id}}').submit();"><i class="fa fa-trash" aria-hidden="true"></i>
                     </a>
                     <form id="delete-product-{{$product->id}}" action="/product/{{$product->id}}" method="POST" class="d-none">
                        @csrf
                        @method("delete")
                     </form>
                     {{--  @endcan  --}}
                </td>
 							</tr>
						 @endforeach
 						</tbody>
 					</table>
 				</div>
 			</div>
 		</div>
 	</div>
 </div>
</div>
</div>
@endsection
@section('js')
<!-- Internal Data tables -->
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
<!--Internal  Datatable js -->
<script src="{{URL::asset('assets/js/table-data.js')}}"></script>
@endsection
