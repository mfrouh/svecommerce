@extends('layouts.app')
@section('title')
تفاصيل الطلب
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
			<h4 class="content-title mb-0 my-auto">تفاصيل الطلب</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0"></span>
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
 					<h4 class="card-title mg-b-0">تفاصيل الطلب</h4>
 				</div>
 			</div>
 			<div class="card-body">
 				<div class="table-responsive">
 					<table id="example1" class="table key-buttons text-md-nowrap text-center">
 						<thead>
 							<tr>
 								<th class="border-bottom-0">اسم الطلب</th>
 								<th class="border-bottom-0">اسم المنتج</th>
                                <th class="border-bottom-0">اسم المنتج</th>
                                <th class="border-bottom-0">السعر</th>
                                <th class="border-bottom-0">السعر الكلي</th>
                                <th class="border-bottom-0">الكمية</th>
 							</tr>
 						</thead>
 						<tbody>
						 @foreach ($orderDetails as $orderDetail)
 							<tr>
 								<td>{{$orderDetail->order->name}}</td>
                                <td>{{$orderDetail->product->name}}</td>
                                <td>{{$orderDetail->name}}</td>
                                <td>{{$orderDetail->price}}</td>
                                <td>{{$orderDetail->total_price}}</td>
                                <td>{{$orderDetail->quantity}}</td>
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
