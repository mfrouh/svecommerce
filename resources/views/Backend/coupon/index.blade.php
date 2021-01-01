@extends('layouts.app')
@section('title')
الخصومات
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
			<h4 class="content-title mb-0 my-auto">الخصومات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0"></span>
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
 					<h4 class="card-title mg-b-0">الخصومات</h4>
 				</div>
 			</div>
 			<div class="card-body">
 				<div class="table-responsive">
 					<table id="example1" class="table key-buttons text-md-nowrap text-center">
 						<thead>
 							<tr>
 								<th class="border-bottom-0">الكود</th>
 								<th class="border-bottom-0">النوع</th>
                                <th class="border-bottom-0">القيمة</th>
                                <th class="border-bottom-0">الرسالة</th>
                                <th class="border-bottom-0">بداية الخصم</th>
                                <th class="border-bottom-0">نهاية الخصم</th>
                                <th class="border-bottom-0">الحالة</th>
                                <th class="border-bottom-0">عددالمرات</th>
                                <th class="border-bottom-0">الشرط</th>
                                <th class="border-bottom-0">قيمة الشرط</th>
 								<th class="border-bottom-0">الصلاحيات</th>
 							</tr>
 						</thead>
 						<tbody>
						 @foreach ($coupons as $coupon)
 							<tr>
 								<td>{{$coupon->code}}</td>
                                <td>{{$coupon->gettype()}}</td>
                                <td>{{$coupon->value}}</td>
                                <td>{{$coupon->message}}</td>
                                <td>{{$coupon->start->format('d-m-Y /h:i A')}}</td>
                                <td>{{$coupon->end->format('d-m-Y /h:i A')}}</td>
                                <td>{{$coupon->activestatus}}</td>
                                <td>{{$coupon->times}}</td>
                                <td>{{$coupon->getcand()}}</td>
                                <td>{{$coupon->cand_value}}</td>
 								<td>
                                     {{--  @can('تعديل عرض')  --}}
                                     <a class="btn btn-primary btn-sm" href="/coupon/{{$coupon->id}}/edit"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                     {{--  @endcan  --}}
                                     {{--  @can('حذف عرض')  --}}
                                     <a class="btn btn-danger btn-sm"  href="/coupon/{{$coupon->id}}"
                                        onclick="event.preventDefault();
                                        document.getElementById('delete-coupon-{{$coupon->id}}').submit();"><i class="fa fa-trash" aria-hidden="true"></i>
                                     </a>
                                     <form id="delete-coupon-{{$coupon->id}}" action="/coupon/{{$coupon->id}}" method="POST" class="d-none">
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
